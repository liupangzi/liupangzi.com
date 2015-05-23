<?php

// Let's define the main class with all the methods that we need
class wp_slimstat_db {
	// Filters
	public static $columns_names = array();
	public static $filters_normalized = array();

	// Number and date formats
	public static $formats = array( 'decimal' => ',', 'thousand' => '.' );

	// Structure that maps filters to SQL information (table names, clauses, lookup tables, etc)
	public static $sql_where = array( 'columns' => '', 'time_range' => '' );

	// Filters that are not visible in the dropdown
	public static $all_columns_names = array();

	/*
	 * Sets the filters and other structures needed to store the data retrieved from the DB
	 */
	public static function init( $_filters = '' ){
		// Decimal and thousand separators
		if ( wp_slimstat::$options[ 'use_european_separators' ] == 'no' ){
			self::$formats[ 'decimal' ] = '.';
			self::$formats[ 'thousand' ] = ',';
		}

		// Filters are defined as: browser equals Chrome|country starts_with en
		if ( !is_string( $_filters ) || empty( $_filters ) ){
			$_filters = '';
		}

		// List of supported filters and their friendly names
		self::$columns_names = array(
			'no_filter_selected_1' => array( '&nbsp;', 'none' ),
			'browser' => array( __( 'Browser', 'wp-slimstat' ), 'varchar' ),
			'country' => array( __( 'Country Code', 'wp-slimstat' ), 'varchar' ),
			'ip' => array( __( 'IP Address', 'wp-slimstat' ), 'int' ),
			'searchterms' => array( __( 'Search Terms', 'wp-slimstat' ), 'varchar' ),
			'language' => array( __( 'Language Code', 'wp-slimstat' ), 'varchar' ),
			'platform' => array( __( 'Operating System', 'wp-slimstat' ), 'varchar' ),
			'resource' => array( __( 'Permalink', 'wp-slimstat' ), 'varchar' ),
			'referer' => array( __( 'Referer', 'wp-slimstat' ), 'varchar' ),
			'username' => array( __( 'Visitor\'s Name', 'wp-slimstat' ), 'varchar' ),
			'outbound_resource' => array( __( 'Outbound Link', 'wp-slimstat' ), 'varchar' ),
			'page_performance' => array( __( 'Page Speed', 'wp-slimstat' ), 'int' ),
			'no_filter_selected_2' => array( '&nbsp;', 'none' ),
			'no_filter_selected_3' => array( __( '-- Advanced filters --', 'wp-slimstat' ), 'none' ),
			'plugins' => array( __( 'Browser Capabilities', 'wp-slimstat' ), 'varchar' ),
			'browser_version' => array( __( 'Browser Version', 'wp-slimstat' ), 'varchar' ),
			'browser_type' => array( __( 'Browser Type', 'wp-slimstat' ), 'int' ),
			'user_agent' => array( __( 'User Agent', 'wp-slimstat' ), 'varchar' ),
			'notes' => array( __( 'Pageview Attributes', 'wp-slimstat' ), 'varchar' ),
			'server_latency' => array( __( 'Server Latency', 'wp-slimstat' ), 'int' ),
			'author' => array( __( 'Post Author', 'wp-slimstat' ), 'varchar' ),
			'category' => array( __( 'Post Category ID', 'wp-slimstat' ), 'varchar' ),
			'other_ip' => array( __( 'Originating IP', 'wp-slimstat' ), 'int' ),
			'content_type' => array( __( 'Resource Content Type', 'wp-slimstat' ), 'varchar' ),
			'content_id' => array( __( 'Resource ID', 'wp-slimstat' ), 'int' ),
			'screen_width' => array( __( 'Screen Width', 'wp-slimstat' ), 'int' ),
			'screen_height' => array( __( 'Screen Height', 'wp-slimstat' ), 'int' ),
			'resolution' => array( __( 'Viewport Size', 'wp-slimstat' ), 'varchar' ),
			'visit_id' => array( __( 'Visit ID', 'wp-slimstat' ), 'int' )
		);

		// The following filters will not be displayed in the dropdown
		self::$all_columns_names = array_merge( array(
			'minute' => array( __( 'Minute', 'wp-slimstat' ), 'int' ),
			'hour' => array( __( 'Hour', 'wp-slimstat' ), 'int' ),
			'day' => array( __( 'Day', 'wp-slimstat' ), 'int' ),
			'month' => array( __( 'Month', 'wp-slimstat' ), 'int' ),
			'year' => array( __( 'Year', 'wp-slimstat' ), 'int' ),
			'interval_direction' => array( __( '+/-', 'wp-slimstat' ), 'int' ),
			'interval' => array( __( 'days', 'wp-slimstat' ), 'int' ),
			'interval_hours' => array( __( 'hours', 'wp-slimstat' ), 'int' ),
			'interval_minutes' => array( __( 'minutes', 'wp-slimstat' ), 'int' ),
			'dt' => array( __( 'Unix Timestamp', 'wp-slimstat' ), 'int' ),

			'limit_results' => array( __( 'Limit Results', 'wp-slimstat' ), 'int' ),
			'start_from' => array( __( 'Start From', 'wp-slimstat' ), 'int' ),

			// Misc Filters
			'strtotime' => array( 0, 'int' )
		), self::$columns_names );

		// Hook for the... filters
		$_filters = apply_filters( 'slimstat_db_pre_filters', $_filters );

		// Normalize the input (filters)
		self::$filters_normalized = self::parse_filters( $_filters );

		// Hook for the array of normalized filters
		self::$filters_normalized = apply_filters( 'slimstat_db_filters_normalized', self::$filters_normalized, $_filters );

		self::$sql_where[ 'columns' ] = self::_get_sql_where( self::$filters_normalized[ 'columns' ] );
		self::$sql_where[ 'time_range' ] = '(dt BETWEEN '.self::$filters_normalized[ 'utime' ][ 'start' ].' AND '.self::$filters_normalized[ 'utime' ][ 'end' ].')';
	}
	// end init

	/**
	 * Builds the array of WHERE clauses to be used later in our SQL queries
	 */
	protected static function _get_sql_where( $_filters_normalized = array() ) {
		$sql_array = array();

		foreach ( $_filters_normalized as $a_filter_column => $a_filter_data ) {
			// Add-ons can set their own custom filters, which are ignored here
			if ( strpos( $a_filter_column, 'addon_' ) !== false ) {
				continue;
			}

			$sql_array[] = self::_get_single_where_clause( $a_filter_column, $a_filter_data[ 0 ], $a_filter_data[ 1 ] );
		}

		// Flatten array
		if ( !empty( $sql_array ) ) {
			return implode( ' AND ', $sql_array );
		}

		return '';
	}

	public static function get_combined_where( $_where = '', $_column = '*', $_use_time_range = true ) {

		if ( empty( $_where ) ) {
			if ( !empty( self::$sql_where[ 'columns' ] ) ) {
				$_where = self::$sql_where[ 'columns' ];
				
				if ($_use_time_range) {
					$_where .= ' AND '.self::$sql_where[ 'time_range' ];
				}
			}
			elseif ( $_use_time_range ) {
				$_where = self::$sql_where[ 'time_range' ];
			}
			else {
				$_where = '1=1';
			}
		}
		else {
			if ( $_where != '1=1' && !empty( self::$sql_where[ 'columns' ] ) ) {
				$_where .= ' AND '.self::$sql_where[ 'columns' ];
			}
			if ( $_use_time_range ) {
				$_where .= ' AND '.self::$sql_where[ 'time_range' ];
			}
		}

		if ( !empty( self::$columns_names[ $_column ] ) ) {
			$filter_empty = "$_column ".( ( self::$columns_names[ $_column ] [ 1 ] == 'varchar' ) ? 'IS NULL' : '= 0' );
			$filter_not_empty = "$_column ".( ( self::$columns_names[ $_column ] [ 1 ] == 'varchar' ) ? 'IS NOT NULL' : '<> 0' );

			if ( strpos( $_where, $filter_empty ) === false && strpos( $_where, $filter_not_empty) === false) {
				$_where = "$filter_not_empty AND $_where";
			}
		}

		return $_where;
	}

	/**
	 * Translates user-friendly operators into SQL conditions
	 */
	protected static function _get_single_where_clause( $_column = 'id', $_operator = 'equals', $_value = '' ) {
		$filter_empty = ( self::$columns_names[ $_column ] [ 1 ] == 'varchar' ) ? 'IS NULL' : '= 0';
		$filter_not_empty = ( self::$columns_names[ $_column ] [ 1 ] == 'varchar' ) ? 'IS NOT NULL' : '<> 0';

		switch( $_column ) {
			case 'ip':
			case 'other_ip':
				$_column = "INET_NTOA( $_column )";
				$filter_empty = '= "0.0.0.0"';
				break;
			default:
				break;
		}

		$where = array( '', $_value );
		switch ( $_operator ) {
			case 'is_not_equal_to':
				$where[0] = "$_column <> %s";
				break;

			case 'contains':
				$where = array( "$_column LIKE %s", '%'.$_value.'%' );
				break;

			case 'includes_in_set':
				$where[0] = "FIND_IN_SET(%s, $_column) > 0";
				break;

			case 'does_not_contain':
				$where = array( "$_column NOT LIKE %s", '%'.$_value.'%' );
				break;

			case 'starts_with':
				$where = array( "$_column LIKE %s", $_value.'%' );
				break;

			case 'ends_with':
				$where = array( "$_column LIKE %s", '%'.$_value );
				break;

			case 'sounds_like':
				$where[0] = "SOUNDEX($_column) = SOUNDEX(%s)";
				break;

			case 'is_empty':
				$where = array( "$_column $filter_empty", array() );
				break;

			case 'is_not_empty':
				$where = array( "$_column $filter_not_empty", array() );
				break;

			case 'is_greater_than':
				$where[0] = "$_column > %d";
				break;

			case 'is_less_than':
				$where[0] = "$_column < %d";
				break;

			case 'between':
				$range = explode(',', $_value);
				$where = array( "$_column BETWEEN %d AND %d", array( $range[0], $range[1] ) );
				break;

			case 'matches':
				$where[0] = "$_column REGEXP %s";
				break;

			case 'does_not_match':
				$where[0] = "$_column NOT REGEXP %s";
				break;

			default:
				$where[0] = "$_column = %s";
				break;
		}

		return $GLOBALS[ 'wpdb' ]->prepare( $where[0], $where[1] );
	}

	protected static function _show_debug( $_message = '' ) {
		echo "<p class='debug'>$_message</p>";
	}

	protected static function _get_results( $_sql = '', $_select_no_aggregate_values = '', $_order_by = '', $_group_by = '', $_aggregate_values_add = '' ) {
		$_sql = apply_filters( 'slimstat_get_results_sql', $_sql, $_select_no_aggregate_values, $_order_by, $_group_by, $_aggregate_values_add );

		if ( wp_slimstat::$options[ 'show_sql_debug' ] == 'yes' ) {
			self::_show_debug( $_sql );
		}

		return wp_slimstat::$wpdb->get_results( $_sql, ARRAY_A );
	}

	protected static function _get_var( $_sql = '', $_aggregate_value = '' ) {
		$_sql = apply_filters( 'slimstat_get_var_sql', $_sql, $_aggregate_value );

		if ( wp_slimstat::$options[ 'show_sql_debug' ] == 'yes' ) {
			self::_show_debug( $_sql );
		}

		return wp_slimstat::$wpdb->get_var( $_sql );
	}

	public static function parse_filters( $_filters = '', $_init_misc = true ) {
		$filters_normalized = array(
			'columns' => array(),
			'date' => array(
				'interval_direction' => '',
				'is_past' => false
			),
			'misc' => $_init_misc?array(
				'limit_results' => wp_slimstat::$options[ 'rows_to_show' ],
				'start_from' => 0
			) : array(),
			'utime' => array(
				'start' => 0,
				'end' => 0,
				'type' => 'm'
			)
		);

		if ( !empty( $_filters ) ) {
			$matches = explode( '&&&', $_filters );
			foreach( $matches as $idx => $a_match ) {
				preg_match( '/([^\s]+)\s([^\s]+)\s(.+)?/', urldecode( $a_match ), $a_filter );

				if ( empty( $a_filter ) || ( ( !array_key_exists( $a_filter[ 1 ], self::$all_columns_names ) || strpos( $a_filter[ 1 ], 'no_filter' ) !== false ) && strpos( $a_filter[ 1 ], 'addon_' ) === false ) ) {
					continue;
				}

				switch( $a_filter[ 1 ] ) {
					case 'strtotime':
						$custom_date = strtotime( $a_filter[ 3 ].' UTC' );

						$filters_normalized[ 'date' ][ 'day' ] = date( 'j', $custom_date );
						$filters_normalized[ 'date' ][ 'month' ] = date( 'n', $custom_date );
						$filters_normalized[ 'date' ][ 'year' ] = date( 'Y', $custom_date );
						break;

					case 'minute':
					case 'hour':
					case 'day':
					case 'month':
					case 'year':
						if ( is_numeric( $a_filter[ 3 ] ) ) {
							$filters_normalized[ 'date' ][ $a_filter[ 1 ] ] = intval( $a_filter[ 3 ] );
						}
						else{
							// Try to apply strtotime to value
							switch( $a_filter[ 1 ] ) {
								case 'minute':
									$filters_normalized[ 'date' ][ 'minute' ] = date( 'i', strtotime( $a_filter[ 3 ], date_i18n( 'U' ) ) );
									$filters_normalized[ 'date' ][ 'is_past' ] = true;
									break;

								case 'hour':
									$filters_normalized[ 'date' ][ 'hour' ] = date( 'H', strtotime( $a_filter[ 3 ], date_i18n( 'U' ) ) );
									$filters_normalized[ 'date' ][ 'is_past' ] = true;
									break;

								case 'day':
									$filters_normalized[ 'date' ][ 'day' ] = date( 'j', strtotime( $a_filter[ 3 ], date_i18n( 'U' ) ) );
									break;

								case 'month':
									$filters_normalized[ 'date' ][ 'month' ] = date( 'n', strtotime( $a_filter[ 3 ], date_i18n( 'U' ) ) );
									break;

								case 'year':
									$filters_normalized[ 'date' ][ 'year' ] = date( 'Y', strtotime( $a_filter[ 3 ], date_i18n( 'U' ) ) );
									break;

								default:
									break;
							}

							if ( $filters_normalized[ 'date' ][ $a_filter[ 1 ] ] === false ) {
								unset( $filters_normalized[ 'date' ][ $a_filter[ 1 ] ] );
							}
						}

						switch( $a_filter[ 1 ] ) {
							case 'day':
								if ( $filters_normalized[ 'date' ][ 'day' ] != date_i18n( 'j' ) ) {
									$filters_normalized[ 'date' ][ 'is_past' ] = true;
								}
								break;

							case 'month':
								if ( $filters_normalized[ 'date' ][ 'month' ] != date_i18n( 'n' ) ) {
									$filters_normalized[ 'date' ][ 'is_past' ] = true;
								}
								break;

							case 'year':
								if ( $filters_normalized[ 'date' ][ 'year' ] != date_i18n( 'Y' ) ) {
									$filters_normalized[ 'date' ][ 'is_past' ] = true;
								}
								break;

							default:
								break;
						}
						break;

					case 'interval':
					case 'interval_hours':
					case 'interval_minutes':
						$intval_filter = intval( $a_filter[ 3 ] );
						$filters_normalized[ 'date' ][ $a_filter[ 1 ] ] = abs( $intval_filter );
						if ( $intval_filter < 0 ) {
							$filters_normalized[ 'date' ][ 'interval_direction' ] = 'minus';
						}
						break;

					case 'interval_direction':
						$filters_normalized[ 'date' ][ $a_filter[ 1 ] ] = in_array( $a_filter[ 3 ], array( 'plus', 'minus' ) ) ? $a_filter[ 3 ] : 'plus';
						break;

					case 'limit_results':
					case 'start_from':
						$filters_normalized[ 'misc' ][ $a_filter[ 1 ] ] = str_replace( '\\', '', htmlspecialchars_decode( $a_filter[ 3 ] ) );
						break;

					default:
						$filters_normalized[ 'columns' ][ $a_filter[ 1 ] ] = array( $a_filter[ 2 ], isset( $a_filter[ 3 ] ) ? str_replace( '\\', '', htmlspecialchars_decode( $a_filter[ 3 ] ) ) : '' );
						break;
				}
			}
		}

		// Temporarily disable any filters on date_i18n
		$date_i18n_filters = array();
		if ( !empty( $GLOBALS[ 'wp_filter' ][ 'date_i18n' ] ) ) {
			$date_i18n_filters = $GLOBALS[ 'wp_filter' ][ 'date_i18n' ];
			remove_all_filters( 'date_i18n' );
		}

		// Let's calculate our time range, based on date filters
		if ( empty( $filters_normalized[ 'date' ][ 'interval' ] ) && empty( $filters_normalized[ 'date' ][ 'interval_hours' ] ) && empty( $filters_normalized[ 'date' ][ 'interval_minutes' ] ) ) {
			if ( !empty( $filters_normalized[ 'date' ][ 'minute' ] ) ) {
				$filters_normalized[ 'utime' ][ 'start' ] = mktime( 
					!empty( $filters_normalized[ 'date' ][ 'hour' ] )?$filters_normalized[ 'date' ][ 'hour' ]:0,
					$filters_normalized[ 'date' ][ 'minute' ],
					0,
					!empty( $filters_normalized[ 'date' ][ 'month' ] )?$filters_normalized[ 'date' ][ 'month' ]:date_i18n( 'n' ),
					!empty( $filters_normalized[ 'date' ][ 'day' ] )?$filters_normalized[ 'date' ][ 'day' ]:date_i18n( 'j' ),
					!empty( $filters_normalized[ 'date' ][ 'year' ] )?$filters_normalized[ 'date' ][ 'year' ]:date_i18n( 'Y' )
				 );
				$filters_normalized[ 'utime' ][ 'end' ] = $filters_normalized[ 'utime' ][ 'start' ] + 60;
				$filters_normalized[ 'utime' ][ 'type' ] = 'H';
			}
			else if ( !empty( $filters_normalized[ 'date' ][ 'hour' ] ) ) {
				$filters_normalized[ 'utime' ][ 'start' ] = mktime( 
					$filters_normalized[ 'date' ][ 'hour' ],
					0,
					0,
					!empty( $filters_normalized[ 'date' ][ 'month' ] )?$filters_normalized[ 'date' ][ 'month' ]:date_i18n( 'n' ),
					!empty( $filters_normalized[ 'date' ][ 'day' ] )?$filters_normalized[ 'date' ][ 'day' ]:date_i18n( 'j' ),
					!empty( $filters_normalized[ 'date' ][ 'year' ] )?$filters_normalized[ 'date' ][ 'year' ]:date_i18n( 'Y' )
				 );
				$filters_normalized[ 'utime' ][ 'end' ] = $filters_normalized[ 'utime' ][ 'start' ] + 3599;
				$filters_normalized[ 'utime' ][ 'type' ] = 'H';
			}
			else if ( !empty( $filters_normalized[ 'date' ][ 'day' ] ) ) {
				$filters_normalized[ 'utime' ][ 'start' ] = mktime( 
					0,
					0,
					0,
					!empty( $filters_normalized[ 'date' ][ 'month' ] )?$filters_normalized[ 'date' ][ 'month' ]:date_i18n( 'n' ),
					$filters_normalized[ 'date' ][ 'day' ],
					!empty( $filters_normalized[ 'date' ][ 'year' ] )?$filters_normalized[ 'date' ][ 'year' ]:date_i18n( 'Y' )
				 );
				$filters_normalized[ 'utime' ][ 'end' ] = $filters_normalized[ 'utime' ][ 'start' ] + 86399;
				$filters_normalized[ 'utime' ][ 'type' ] = 'd';
			}
			else if( !empty( $filters_normalized[ 'date' ][ 'year' ] ) && empty( $filters_normalized[ 'date' ][ 'month' ] ) ) {
				$filters_normalized[ 'utime' ][ 'start' ] = mktime( 0, 0, 0, 1, 1, $filters_normalized[ 'date' ][ 'year' ] );
				$filters_normalized[ 'utime' ][ 'end' ] = mktime( 0, 0, 0, 1, 1, $filters_normalized[ 'date' ][ 'year' ]+1 )-1;
				$filters_normalized[ 'utime' ][ 'type' ] = 'Y';
			}
			else {
				$filters_normalized[ 'utime' ][ 'start' ] = mktime( 
					0,
					0,
					0,
					!empty( $filters_normalized[ 'date' ][ 'month' ] )?$filters_normalized[ 'date' ][ 'month' ]:date_i18n( 'n' ),
					1,
					!empty( $filters_normalized[ 'date' ][ 'year' ] )?$filters_normalized[ 'date' ][ 'year' ]:date_i18n( 'Y' )
				 );

				$filters_normalized[ 'utime' ][ 'end' ] = strtotime( 
					( !empty( $filters_normalized[ 'date' ][ 'year' ] )?$filters_normalized[ 'date' ][ 'year' ]:date_i18n( 'Y' ) ).'-'.
					( !empty( $filters_normalized[ 'date' ][ 'month' ] )?$filters_normalized[ 'date' ][ 'month' ]:date_i18n( 'n' ) ).
					'-01 00:00 +1 month UTC'
				 )-1;
				$filters_normalized[ 'utime' ][ 'type' ] = 'm';
			}
		}
		else { // An interval was specified
			$filters_normalized[ 'utime' ][ 'type' ] = 'interval';

			$filters_normalized[ 'utime' ][ 'start' ] = mktime( 
				!empty( $filters_normalized[ 'date' ][ 'hour' ] )?$filters_normalized[ 'date' ][ 'hour' ]:0,
				!empty( $filters_normalized[ 'date' ][ 'minute' ] )?$filters_normalized[ 'date' ][ 'minute' ]:0,
				0,
				!empty( $filters_normalized[ 'date' ][ 'month' ] )?$filters_normalized[ 'date' ][ 'month' ]:date_i18n( 'n' ),
				!empty( $filters_normalized[ 'date' ][ 'day' ] )?$filters_normalized[ 'date' ][ 'day' ]:date_i18n( 'j' ),
				!empty( $filters_normalized[ 'date' ][ 'year' ] )?$filters_normalized[ 'date' ][ 'year' ]:date_i18n( 'Y' )
			 );

			$sign = ( $filters_normalized[ 'date' ][ 'interval_direction' ] == 'plus' )?'+':'-';

			$filters_normalized[ 'utime' ][ 'end' ] = $filters_normalized[ 'utime' ][ 'start' ] + intval( $sign.( 
					( !empty( $filters_normalized[ 'date' ][ 'interval' ] )?intval( $filters_normalized[ 'date' ][ 'interval' ] + 1 ):0 ) * 86400 + 
					( !empty( $filters_normalized[ 'date' ][ 'interval_hours' ] )?intval( $filters_normalized[ 'date' ][ 'interval_hours' ] ):0 ) * 3600 +
					( !empty( $filters_normalized[ 'date' ][ 'interval_minutes' ] )?intval( $filters_normalized[ 'date' ][ 'interval_minutes' ] ):0 ) * 60
				 ) ) - 1;

			// Swap boundaries if we're going back in time
			if ( $filters_normalized[ 'date' ][ 'interval_direction' ] == 'minus' ) {
				list( $filters_normalized[ 'utime' ][ 'start' ], $filters_normalized[ 'utime' ][ 'end' ] ) = array( $filters_normalized[ 'utime' ][ 'end' ] + 86401, $filters_normalized[ 'utime' ][ 'start' ] + 86399 );
			}
		}

		// If end is in the future, set it to now
		if ( $filters_normalized[ 'utime' ][ 'end' ] > date_i18n( 'U' ) ) {
			$filters_normalized[ 'utime' ][ 'end' ] = date_i18n( 'U' );
		}

		// If start is after end, set it to first of month
		if ( $filters_normalized[ 'utime' ][ 'start' ] > $filters_normalized[ 'utime' ][ 'end' ] ) {
			$filters_normalized[ 'utime' ][ 'start' ] = mktime( 
				0,
				0,
				0,
				date_i18n( 'n', $filters_normalized[ 'utime' ][ 'end' ] ),
				1,
				date_i18n( 'Y', $filters_normalized[ 'utime' ][ 'end' ] )
			 );
			$filters_normalized[ 'date' ][ 'hour' ] = $filters_normalized[ 'date' ][ 'day' ] = $filters_normalized[ 'date' ][ 'month' ] = $filters_normalized[ 'date' ][ 'year' ] = 0;
		}

		// Restore filters on date_i18n
		foreach ($date_i18n_filters as $i18n_priority => $i18n_func_list) {
			foreach ($i18n_func_list as $func_name => $func_args) {
				add_filter('date_i8n', $func_args[ 'function' ], $i18n_priority, $func_args[ 'accepted_args' ]);
			}
		}

		return $filters_normalized;
	}

	// The following methods retrieve the information from the database

	public static function count_bouncing_pages() {
		$where = self::get_combined_where( 'visit_id > 0 AND content_type <> "404"', 'resource' );

		return intval( self::_get_var( "
			SELECT COUNT(*) counthits
				FROM (
					SELECT resource, visit_id
					FROM {$GLOBALS['wpdb']->prefix}slim_stats
					WHERE $where
					GROUP BY resource
					HAVING COUNT(visit_id) = 1
				) as ts1",
			'SUM(counthits) AS counthits' ) );
	}

	public static function count_exit_pages() {
		$where = self::get_combined_where( 'visit_id > 0', 'resource' );

		return intval( self::_get_var( "
			SELECT COUNT(*) counthits
				FROM (
					SELECT resource, dt
					FROM {$GLOBALS['wpdb']->prefix}slim_stats
					WHERE $where
					GROUP BY resource
					HAVING dt = MAX(dt)
				) AS ts1",
			'SUM(counthits) AS counthits' ) );
	}

	public static function count_records( $_column = 'id', $_where = '', $_use_time_range = true ) {
		$distinct_column = ( $_column != 'id' ) ? "DISTINCT $_column" : $_column;
		$_where = self::get_combined_where( $_where, $_column, $_use_time_range );

		return intval( self::_get_var( "
			SELECT COUNT($distinct_column) counthits
			FROM {$GLOBALS['wpdb']->prefix}slim_stats
			WHERE $_where",
			'SUM(counthits) AS counthits' ) );
	}

	public static function count_records_having( $_column = 'id', $_where = '', $_having = '' ) {
		$_where = self::get_combined_where( $_where, $_column );

		return intval( self::_get_var( "
			SELECT COUNT(*) counthits FROM (
				SELECT $_column
				FROM {$GLOBALS['wpdb']->prefix}slim_stats
				WHERE $_where
				GROUP BY $_column
				HAVING $_having
			) AS ts1",
			'SUM(counthits) AS counthits' ) );
	}

	public static function get_data_for_chart( $_data1 = '', $_data2 = '', $_where = '' ) {
		$previous = array( 'end' => self::$filters_normalized[ 'utime' ][ 'start' ] - 1 );
		$label_date_format = '';
		$output = array();

		// Each type has its own parameters
		switch (self::$filters_normalized[ 'utime' ][ 'type' ]) {
			case 'H':
				$previous[ 'start' ] = self::$filters_normalized[ 'utime' ][ 'start' ] - 3600;
				$label_date_format = wp_slimstat::$options[ 'time_format' ];
				$group_by = array( 'HOUR', 'MINUTE', 'i' );
				$values_in_interval = array( 59, 59, 0, 60 ); 
				break;

			case 'd':
				$previous[ 'start' ] = self::$filters_normalized[ 'utime' ][ 'start' ] - 86400;
				$label_date_format = ( self::$formats[ 'decimal' ] == '.' ) ? 'm/d' : 'd/m';
				$group_by = array( 'DAY', 'HOUR', 'G' );
				$values_in_interval = array( 23, 23, 0, 3600 );
				break;

			case 'Y':
				$previous[ 'start' ] = mktime( 0, 0, 0, 1, 1, self::$filters_normalized[ 'date' ][ 'year' ] - 1 );
				$label_date_format = 'Y';
				$group_by = array( 'YEAR', 'MONTH', 'n' );
				$values_in_interval = array( 12, 12, 1, 2678400 );
				break;

			case 'interval':
				$group_by = array( 'MONTH', 'DAY', 'j' );
				$values_in_interval = array( abs( self::$filters_normalized[ 'date' ][ 'interval' ] ), abs( self::$filters_normalized[ 'date' ][ 'interval' ] ), 0, 86400 );
				break;

			default:
				$previous[ 'start' ] = mktime( 0, 0, 0, ( !empty( self::$filters_normalized[ 'date' ][ 'month' ] ) ? self::$filters_normalized[ 'date' ][ 'month' ] : date_i18n('n') ) - 1, 1, !empty( self::$filters_normalized[ 'date' ][ 'year' ]) ? self::$filters_normalized[ 'date' ][ 'year' ] : date_i18n( 'Y' ) );
				$label_date_format = 'm/Y';
				$group_by = array( 'MONTH', 'DAY', 'j' );
				$values_in_interval = array( date( 't', $previous[ 'start' ] ), date( 't', self::$filters_normalized[ 'utime' ][ 'start' ] ), 1, 86400 );
				break;
		}

		// Custom intervals don't have a comparison chart ('previous' range)
		if ( empty( self::$filters_normalized[ 'date' ][ 'interval' ] ) ) {
			$_where = self::get_combined_where( $_where, '*', false );
			$previous_time_range = ' AND (dt BETWEEN '.$previous[ 'start' ].' AND '.$previous[ 'end' ].' OR dt BETWEEN '.self::$filters_normalized[ 'utime' ][ 'start' ].' AND '.self::$filters_normalized[ 'utime' ][ 'end' ].')';
		}
		else {
			$_where = self::get_combined_where( $_where );
			$previous_time_range = '';
		}

		// Build the SQL query
		$group_by_string = "GROUP BY {$group_by[0]}(CONVERT_TZ(FROM_UNIXTIME(dt), @@session.time_zone, '+00:00')), {$group_by[1]}(CONVERT_TZ(FROM_UNIXTIME(dt), @@session.time_zone, '+00:00'))";
		$sql = "
			SELECT dt, $_data1 first_metric, $_data2 second_metric
			FROM {$GLOBALS['wpdb']->prefix}slim_stats
			WHERE $_where $previous_time_range
			$group_by_string";

		// Get the data
		$results = self::_get_results( $sql, 'blog_id', '', $group_by_string, 'SUM(first_metric) AS first_metric, SUM(second_metric) AS second_metric' );

		// Fill the output array
		$output[ 'current' ][ 'label' ] = '';
		if ( !empty( $label_date_format ) ) {
			$output[ 'current' ][ 'label' ] = gmdate( $label_date_format, self::$filters_normalized[ 'utime' ][ 'start' ] );
			$output[ 'previous' ][ 'label' ] = gmdate( $label_date_format, $previous[ 'start' ] );
		}

		$output[ 'previous' ][ 'first_metric' ] = array_fill( $values_in_interval[ 2 ], $values_in_interval[ 0 ], 0 );
		$output['previous']['second_metric'] = array_fill( $values_in_interval[ 2 ], $values_in_interval[ 0 ], 0 );

		$today_limit = floatval( date_i18n( 'Ymd.Hi' ) );
		for ( $i = $values_in_interval[ 2 ]; $i <= $values_in_interval[ 1 ]; $i++ ){
			// Do not include dates in the future
			if ( floatval( date( 'Ymd.Hi', wp_slimstat_db::$filters_normalized[ 'utime' ][ 'start' ] + ( ( $i - $values_in_interval[ 2 ]) * $values_in_interval[ 3 ] ) ) ) > $today_limit ) {
				continue;
			}

			$output[ 'current' ][ 'first_metric' ][ $i ] = 0;
			$output[ 'current' ][ 'second_metric' ][ $i ] = 0;
		}

		// No data? No problem!
		if ( !is_array( $results ) || empty( $results ) ) {
			return $output;
		}

		// Rearrange the data and then format it for Flot
		foreach  ($results as $i => $a_result ) {
			$index = !empty( self::$filters_normalized[ 'date' ][ 'interval' ] ) ? floor( ( $a_result['dt'] - wp_slimstat_db::$filters_normalized[ 'utime' ][ 'start' ] ) / 86400 ) : gmdate( $group_by[ 2 ], $a_result[ 'dt' ] );

			if ( empty( self::$filters_normalized[ 'date' ][ 'interval' ] ) && gmdate( self::$filters_normalized[ 'utime' ][ 'type' ], $a_result[ 'dt' ] ) == gmdate( self::$filters_normalized[ 'utime' ][ 'type' ], $previous[ 'start' ] ) ){
				$output[ 'previous' ][ 'first_metric' ][ $index ] = $a_result[ 'first_metric' ];
				$output[ 'previous' ][ 'second_metric' ][ $index ] = $a_result[ 'second_metric' ];
			}
			if ( !empty( self::$filters_normalized[ 'date' ][ 'interval' ] ) || gmdate( self::$filters_normalized[ 'utime' ][ 'type' ], $a_result[ 'dt' ] ) == gmdate( self::$filters_normalized[ 'utime' ][ 'type' ], self::$filters_normalized[ 'utime' ][ 'start' ] ) ){
				$output[ 'current' ][ 'first_metric' ][ $index ] = $a_result[ 'first_metric' ];
				$output[ 'current' ][ 'second_metric' ][ $index ] = $a_result[ 'second_metric' ];
			}
		}

		return $output;
	}

	public static function get_data_size() {
		$suffix = 'KB';

		$sql = 'SHOW TABLE STATUS LIKE "'.$GLOBALS[ 'wpdb' ]->prefix.'slim_stats"';
		$table_details = wp_slimstat::$wpdb->get_row( $sql, 'ARRAY_A', 0 );

		$table_size = ( $table_details[ 'Data_length' ] / 1024 ) + ( $table_details[ 'Index_length' ] / 1024 );

		if ( $table_size > 1024 ) {
			$table_size /= 1024;
			$suffix = 'MB';
		}
		return number_format( $table_size, 2, self::$formats[ 'decimal' ], self::$formats[ 'thousand' ] ).' '.$suffix;
	}

	public static function get_max_and_average_pages_per_visit() {
		$where = self::get_combined_where( 'visit_id > 0' );

		return self::_get_results( "
			SELECT AVG(ts1.counthits) AS avghits, MAX(ts1.counthits) AS maxhits FROM (
				SELECT count(ip) counthits, visit_id
				FROM {$GLOBALS['wpdb']->prefix}slim_stats
				WHERE $where
				GROUP BY visit_id
			) AS ts1",
			'blog_id',
			'',
			'',
			'AVG(avghits) AS avghits, MAX(maxhits) AS maxhits' );
	}

	public static function get_oldest_visit() {
		return self::_get_var( "
			SELECT dt
			FROM {$GLOBALS['wpdb']->prefix}slim_stats
			ORDER BY dt ASC
			LIMIT 0,1",
			'MIN(dt)' );
	}

	public static function get_recent( $_column = '*', $_where = '', $_having = '', $_use_time_range = true, $_as_column = '' ) {
		if ( !empty( $_as_column ) ) {
			$_column = "$_column AS $_as_column";
		}
		else {
			$_as_column = $_column;
		}

		$_where = self::get_combined_where( $_where, $_column, $_use_time_range );

		if ( $_column == '*' ) {
			return self::_get_results( "
				SELECT *
				FROM {$GLOBALS['wpdb']->prefix}slim_stats
				WHERE $_where
				ORDER BY dt DESC
				LIMIT ".self::$filters_normalized[ 'misc' ][ 'start_from' ].', '.self::$filters_normalized[ 'misc' ][ 'limit_results' ],
				$_column,
				'dt DESC' );
		}
		else {
			return self::_get_results( "
				SELECT t1.*
				FROM (
					SELECT $_column, MAX(id) maxid
					FROM {$GLOBALS['wpdb']->prefix}slim_stats
					WHERE $_where
					GROUP BY $_as_column $_having
				) AS ts1 INNER JOIN {$GLOBALS['wpdb']->prefix}slim_stats t1 ON ts1.maxid = t1.id
				ORDER BY t1.dt DESC
				LIMIT ".self::$filters_normalized[ 'misc' ][ 'start_from' ].', '.self::$filters_normalized[ 'misc' ][ 'limit_results' ],
				( ( !empty( $_as_column ) && $_as_column != $_column ) ? $_as_column : $_column ).', blog_id',
				't1.dt DESC' );
		}
	}
	
	public static function get_top( $_column = 'id', $_where = '', $_having = '', $_use_time_range = true, $_as_column = '' ){
		if ( !empty( $_as_column ) ) {
			$_column = "$_column AS $_as_column";
		}
		else {
			$_as_column = $_column;
		}

		$_where = self::get_combined_where( $_where, $_as_column, $_use_time_range );

		return self::_get_results( "
			SELECT $_column, COUNT(*) counthits
			FROM {$GLOBALS['wpdb']->prefix}slim_stats
			WHERE $_where
			GROUP BY $_as_column $_having
			ORDER BY counthits DESC
			LIMIT ".self::$filters_normalized[ 'misc' ][ 'start_from' ].', '.self::$filters_normalized[ 'misc' ][ 'limit_results' ], 
			( ( !empty( $_as_column ) && $_as_column != $_column ) ? $_as_column : $_column ).', blog_id',
			'counthits DESC',
			$_column,
			'SUM(counthits) AS counthits' );
	}

	public static function get_top_complete( $_column = 'id', $_where = '', $_outer_select_column = '', $_aggr_function = 'MAX' ) {
		$_where = self::get_combined_where( $_where, $_column );

		return self::_get_results( "
			SELECT $_outer_select_column, ts1.maxid, COUNT(*) counthits
			FROM (
				SELECT $_column, $_aggr_function(id) maxid
				FROM {$GLOBALS['wpdb']->prefix}slim_stats
				WHERE $_where
				GROUP BY $_column
			) AS ts1 JOIN {$GLOBALS['wpdb']->prefix}slim_stats t1 ON ts1.maxid = t1.id 
			GROUP BY $_outer_select_column
			ORDER BY counthits DESC
			LIMIT ".self::$filters_normalized[ 'misc' ][ 'start_from' ].', '.self::$filters_normalized[ 'misc' ][ 'limit_results' ],
			$column_for_select,
			'counthits DESC',
			$column_for_select,
			'MAX(maxid), SUM(counthits)' );
	}
}