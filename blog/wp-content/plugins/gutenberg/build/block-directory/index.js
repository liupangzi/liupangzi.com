this.wp=this.wp||{},this.wp.blockDirectory=function(e){var t={};function n(r){if(t[r])return t[r].exports;var c=t[r]={i:r,l:!1,exports:{}};return e[r].call(c.exports,c,c.exports,n),c.l=!0,c.exports}return n.m=e,n.c=t,n.d=function(e,t,r){n.o(e,t)||Object.defineProperty(e,t,{enumerable:!0,get:r})},n.r=function(e){"undefined"!=typeof Symbol&&Symbol.toStringTag&&Object.defineProperty(e,Symbol.toStringTag,{value:"Module"}),Object.defineProperty(e,"__esModule",{value:!0})},n.t=function(e,t){if(1&t&&(e=n(e)),8&t)return e;if(4&t&&"object"==typeof e&&e&&e.__esModule)return e;var r=Object.create(null);if(n.r(r),Object.defineProperty(r,"default",{enumerable:!0,value:e}),2&t&&"string"!=typeof e)for(var c in e)n.d(r,c,function(t){return e[t]}.bind(null,c));return r},n.n=function(e){var t=e&&e.__esModule?function(){return e.default}:function(){return e};return n.d(t,"a",t),t},n.o=function(e,t){return Object.prototype.hasOwnProperty.call(e,t)},n.p="",n(n.s=385)}({0:function(e,t){!function(){e.exports=this.wp.element}()},1:function(e,t){!function(){e.exports=this.wp.i18n}()},11:function(e,t){!function(){e.exports=this.wp.blocks}()},12:function(e,t,n){"use strict";n.d(t,"a",(function(){return a}));var r=n(36);var c=n(29),o=n(37);function a(e,t){return Object(r.a)(e)||function(e,t){if("undefined"!=typeof Symbol&&Symbol.iterator in Object(e)){var n=[],r=!0,c=!1,o=void 0;try{for(var a,l=e[Symbol.iterator]();!(r=(a=l.next()).done)&&(n.push(a.value),!t||n.length!==t);r=!0);}catch(e){c=!0,o=e}finally{try{r||null==l.return||l.return()}finally{if(c)throw o}}return n}}(e,t)||Object(c.a)(e,t)||Object(o.a)()}},120:function(e,t,n){"use strict";var r=n(5),c=n(14),o=n(0);function a(e,t){var n=Object.keys(e);if(Object.getOwnPropertySymbols){var r=Object.getOwnPropertySymbols(e);t&&(r=r.filter((function(t){return Object.getOwnPropertyDescriptor(e,t).enumerable}))),n.push.apply(n,r)}return n}t.a=function(e){var t=e.icon,n=e.size,l=void 0===n?24:n,i=Object(c.a)(e,["icon","size"]);return Object(o.cloneElement)(t,function(e){for(var t=1;t<arguments.length;t++){var n=null!=arguments[t]?arguments[t]:{};t%2?a(Object(n),!0).forEach((function(t){Object(r.a)(e,t,n[t])})):Object.getOwnPropertyDescriptors?Object.defineProperties(e,Object.getOwnPropertyDescriptors(n)):a(Object(n)).forEach((function(t){Object.defineProperty(e,t,Object.getOwnPropertyDescriptor(n,t))}))}return e}({width:l,height:l},i))}},14:function(e,t,n){"use strict";n.d(t,"a",(function(){return c}));var r=n(41);function c(e,t){if(null==e)return{};var n,c,o=Object(r.a)(e,t);if(Object.getOwnPropertySymbols){var a=Object.getOwnPropertySymbols(e);for(c=0;c<a.length;c++)n=a[c],t.indexOf(n)>=0||Object.prototype.propertyIsEnumerable.call(e,n)&&(o[n]=e[n])}return o}},16:function(e,t,n){"use strict";n.d(t,"a",(function(){return a}));var r=n(27);var c=n(35),o=n(29);function a(e){return function(e){if(Array.isArray(e))return Object(r.a)(e)}(e)||Object(c.a)(e)||Object(o.a)(e)||function(){throw new TypeError("Invalid attempt to spread non-iterable instance.\nIn order to be iterable, non-array objects must have a [Symbol.iterator]() method.")}()}},166:function(e,t,n){"use strict";var r=n(0),c=n(7),o=Object(r.createElement)(c.SVG,{xmlns:"http://www.w3.org/2000/svg",viewBox:"0 0 24 24"},Object(r.createElement)(c.Path,{d:"M11.776 4.454a.25.25 0 01.448 0l2.069 4.192a.25.25 0 00.188.137l4.626.672a.25.25 0 01.139.426l-3.348 3.263a.25.25 0 00-.072.222l.79 4.607a.25.25 0 01-.362.263l-4.138-2.175a.25.25 0 00-.232 0l-4.138 2.175a.25.25 0 01-.363-.263l.79-4.607a.25.25 0 00-.071-.222L4.754 9.881a.25.25 0 01.139-.426l4.626-.672a.25.25 0 00.188-.137l2.069-4.192z"}));t.a=o},167:function(e,t,n){"use strict";var r=n(0),c=n(7),o=Object(r.createElement)(c.SVG,{xmlns:"http://www.w3.org/2000/svg",viewBox:"0 0 24 24"},Object(r.createElement)(c.Path,{fillRule:"evenodd",d:"M9.706 8.646a.25.25 0 01-.188.137l-4.626.672a.25.25 0 00-.139.427l3.348 3.262a.25.25 0 01.072.222l-.79 4.607a.25.25 0 00.362.264l4.138-2.176a.25.25 0 01.233 0l4.137 2.175a.25.25 0 00.363-.263l-.79-4.607a.25.25 0 01.072-.222l3.347-3.262a.25.25 0 00-.139-.427l-4.626-.672a.25.25 0 01-.188-.137l-2.069-4.192a.25.25 0 00-.448 0L9.706 8.646zM12 7.39l-.948 1.921a1.75 1.75 0 01-1.317.957l-2.12.308 1.534 1.495c.412.402.6.982.503 1.55l-.362 2.11 1.896-.997a1.75 1.75 0 011.629 0l1.895.997-.362-2.11a1.75 1.75 0 01.504-1.55l1.533-1.495-2.12-.308a1.75 1.75 0 01-1.317-.957L12 7.39z",clipRule:"evenodd"}));t.a=o},2:function(e,t){!function(){e.exports=this.lodash}()},22:function(e,t){!function(){e.exports=this.regeneratorRuntime}()},241:function(e,t){!function(){e.exports=this.wp.editPost}()},264:function(e,t,n){"use strict";var r=n(0),c=n(7),o=Object(r.createElement)(c.SVG,{xmlns:"http://www.w3.org/2000/svg",viewBox:"-2 -2 24 24"},Object(r.createElement)(c.Path,{d:"M10.2 3.28c3.53 0 6.43 2.61 6.92 6h2.08l-3.5 4-3.5-4h2.32c-.45-1.97-2.21-3.45-4.32-3.45-1.45 0-2.73.71-3.54 1.78L4.95 5.66C6.23 4.2 8.11 3.28 10.2 3.28zm-.4 13.44c-3.52 0-6.43-2.61-6.92-6H.8l3.5-4c1.17 1.33 2.33 2.67 3.5 4H5.48c.45 1.97 2.21 3.45 4.32 3.45 1.45 0 2.73-.71 3.54-1.78l1.71 1.95c-1.28 1.46-3.15 2.38-5.25 2.38z"}));t.a=o},27:function(e,t,n){"use strict";function r(e,t){(null==t||t>e.length)&&(t=e.length);for(var n=0,r=new Array(t);n<t;n++)r[n]=e[n];return r}n.d(t,"a",(function(){return r}))},28:function(e,t){!function(){e.exports=this.wp.url}()},29:function(e,t,n){"use strict";n.d(t,"a",(function(){return c}));var r=n(27);function c(e,t){if(e){if("string"==typeof e)return Object(r.a)(e,t);var n=Object.prototype.toString.call(e).slice(8,-1);return"Object"===n&&e.constructor&&(n=e.constructor.name),"Map"===n||"Set"===n?Array.from(n):"Arguments"===n||/^(?:Ui|I)nt(?:8|16|32)(?:Clamped)?Array$/.test(n)?Object(r.a)(e,t):void 0}}},3:function(e,t){!function(){e.exports=this.wp.components}()},34:function(e,t){!function(){e.exports=this.wp.dataControls}()},35:function(e,t,n){"use strict";function r(e){if("undefined"!=typeof Symbol&&Symbol.iterator in Object(e))return Array.from(e)}n.d(t,"a",(function(){return r}))},36:function(e,t,n){"use strict";function r(e){if(Array.isArray(e))return e}n.d(t,"a",(function(){return r}))},37:function(e,t,n){"use strict";function r(){throw new TypeError("Invalid attempt to destructure non-iterable instance.\nIn order to be iterable, non-array objects must have a [Symbol.iterator]() method.")}n.d(t,"a",(function(){return r}))},385:function(e,t,n){"use strict";n.r(t);var r={};n.r(r),n.d(r,"isRequestingDownloadableBlocks",(function(){return O})),n.d(r,"getDownloadableBlocks",(function(){return p})),n.d(r,"getInstalledBlockTypes",(function(){return m})),n.d(r,"getNewBlockTypes",(function(){return j})),n.d(r,"getUnusedBlockTypes",(function(){return y})),n.d(r,"isInstalling",(function(){return h})),n.d(r,"getErrorNotices",(function(){return k})),n.d(r,"getErrorNoticeForBlock",(function(){return g}));var c={};n.r(c),n.d(c,"fetchDownloadableBlocks",(function(){return D})),n.d(c,"receiveDownloadableBlocks",(function(){return L})),n.d(c,"installBlockType",(function(){return C})),n.d(c,"uninstallBlockType",(function(){return A})),n.d(c,"addInstalledBlockType",(function(){return R})),n.d(c,"removeInstalledBlockType",(function(){return M})),n.d(c,"setIsInstalling",(function(){return F})),n.d(c,"setErrorNotice",(function(){return z})),n.d(c,"clearErrorNotice",(function(){return V}));n(69);var o=n(5),a=n(4),l=n(34),i=n(16),s=n(2);function u(e,t){var n=Object.keys(e);if(Object.getOwnPropertySymbols){var r=Object.getOwnPropertySymbols(e);t&&(r=r.filter((function(t){return Object.getOwnPropertyDescriptor(e,t).enumerable}))),n.push.apply(n,r)}return n}function b(e){for(var t=1;t<arguments.length;t++){var n=null!=arguments[t]?arguments[t]:{};t%2?u(Object(n),!0).forEach((function(t){Object(o.a)(e,t,n[t])})):Object.getOwnPropertyDescriptors?Object.defineProperties(e,Object.getOwnPropertyDescriptors(n)):u(Object(n)).forEach((function(t){Object.defineProperty(e,t,Object.getOwnPropertyDescriptor(n,t))}))}return e}var d=Object(a.combineReducers)({downloadableBlocks:function(){var e=arguments.length>0&&void 0!==arguments[0]?arguments[0]:{},t=arguments.length>1?arguments[1]:void 0;switch(t.type){case"FETCH_DOWNLOADABLE_BLOCKS":return b({},e,Object(o.a)({},t.filterValue,{isRequesting:!0}));case"RECEIVE_DOWNLOADABLE_BLOCKS":return b({},e,Object(o.a)({},t.filterValue,{results:t.downloadableBlocks,isRequesting:!1}))}return e},blockManagement:function(){var e=arguments.length>0&&void 0!==arguments[0]?arguments[0]:{installedBlockTypes:[],isInstalling:{}},t=arguments.length>1?arguments[1]:void 0;switch(t.type){case"ADD_INSTALLED_BLOCK_TYPE":return b({},e,{installedBlockTypes:[].concat(Object(i.a)(e.installedBlockTypes),[t.item])});case"REMOVE_INSTALLED_BLOCK_TYPE":return b({},e,{installedBlockTypes:e.installedBlockTypes.filter((function(e){return e.name!==t.item.name}))});case"SET_INSTALLING_BLOCK":return b({},e,{isInstalling:b({},e.isInstalling,Object(o.a)({},t.blockId,t.isInstalling))})}return e},errorNotices:function(){var e=arguments.length>0&&void 0!==arguments[0]?arguments[0]:{},t=arguments.length>1?arguments[1]:void 0;switch(t.type){case"SET_ERROR_NOTICE":return b({},e,Object(o.a)({},t.blockId,{message:t.message,isFatal:t.isFatal}));case"CLEAR_ERROR_NOTICE":return Object(s.omit)(e,t.blockId)}return e}});function f(e){var t=arguments.length>1&&void 0!==arguments[1]?arguments[1]:[];if(!t.length)return!1;if(t.some((function(t){return t.name===e.name})))return!0;for(var n=0;n<t.length;n++)if(f(e,t[n].innerBlocks))return!0;return!1}function O(e,t){return!(!e.downloadableBlocks[t]||!e.downloadableBlocks[t].isRequesting)&&e.downloadableBlocks[t].isRequesting}function p(e,t){return e.downloadableBlocks[t]&&e.downloadableBlocks[t].results?e.downloadableBlocks[t].results:[]}function m(e){return e.blockManagement.installedBlockTypes}var j=Object(a.createRegistrySelector)((function(e){return function(t){var n=e("core/block-editor").getBlocks(),r=m(t),c=[];return r.forEach((function(e){f(e,n)&&c.push(e)})),c}})),y=Object(a.createRegistrySelector)((function(e){return function(t){var n=e("core/block-editor").getBlocks(),r=m(t),c=[];return r.forEach((function(e){f(e,n)||c.push(e)})),c}}));function h(e,t){return e.blockManagement.isInstalling[t]||!1}function k(e){return e.errorNotices}function g(e,t){return e.errorNotices[t]}var v=n(22),w=n.n(v),E=n(1),_=n(28);function P(e){return{type:"LOAD_ASSETS",assets:e}}var S={LOAD_ASSETS:function(e){var t=e.assets.map((function(e){return null!==Object(_.getPath)(e).match(/\.js$/)?function(e){return e&&/\.js$/.test(Object(_.getPath)(e))?new Promise((function(t,n){var r=document.querySelector('script[src="'.concat(e,'"]'));r&&r.parentNode.removeChild(r);var c=document.createElement("script");c.src=e,c.onload=function(){return t(!0)},c.onerror=function(){return n(new Error("Error loading script."))},document.body.appendChild(c)})):Promise.reject(new Error("No script found."))}(e):function(e){return e&&/\.css$/.test(Object(_.getPath)(e))?new Promise((function(t,n){var r=document.createElement("link");r.rel="stylesheet",r.href=e,r.onload=function(){return t(!0)},r.onerror=function(){return n(new Error("Error loading style."))},document.body.appendChild(r)})):Promise.reject(new Error("No style found."))}(e)}));return Promise.all(t)}};function B(e){if(!e)return!1;var t=e.links["wp:plugin"]||e.links.self;return!(!t||!t.length)&&t[0].href}var N=w.a.mark(C),x=w.a.mark(A);function T(e,t){var n=Object.keys(e);if(Object.getOwnPropertySymbols){var r=Object.getOwnPropertySymbols(e);t&&(r=r.filter((function(t){return Object.getOwnPropertyDescriptor(e,t).enumerable}))),n.push.apply(n,r)}return n}function I(e){for(var t=1;t<arguments.length;t++){var n=null!=arguments[t]?arguments[t]:{};t%2?T(Object(n),!0).forEach((function(t){Object(o.a)(e,t,n[t])})):Object.getOwnPropertyDescriptors?Object.defineProperties(e,Object.getOwnPropertyDescriptors(n)):T(Object(n)).forEach((function(t){Object.defineProperty(e,t,Object.getOwnPropertyDescriptor(n,t))}))}return e}function D(e){return{type:"FETCH_DOWNLOADABLE_BLOCKS",filterValue:e}}function L(e,t){return{type:"RECEIVE_DOWNLOADABLE_BLOCKS",downloadableBlocks:e,filterValue:t}}function C(e){var t,n,r,c,o,a,i,s,u,b;return w.a.wrap((function(d){for(;;)switch(d.prev=d.next){case 0:return t=e.id,n=e.assets,r=!1,d.next=4,V(t);case 4:if(d.prev=4,Array.isArray(n)&&n.length){d.next=7;break}throw new Error(Object(E.__)("Block has no assets."));case 7:return d.next=9,F(e.id,!0);case 9:if(c=B(e),o={},!c){d.next=16;break}return d.next=14,Object(l.apiFetch)({url:c,data:{status:"active"},method:"PUT"});case 14:d.next=20;break;case 16:return d.next=18,Object(l.apiFetch)({path:"wp/v2/plugins",data:{slug:e.id,status:"active"},method:"POST"});case 18:a=d.sent,o=a._links;case 20:return d.next=22,R(I({},e,{links:I({},e.links,{},o)}));case 22:return d.next=24,P(n);case 24:return d.next=26,Object(l.select)("core/blocks","getBlockTypes");case 26:if((i=d.sent).length&&i.filter((function(t){return t.name===e.name})).length){d.next=29;break}throw new Error(Object(E.__)("Error registering block. Try reloading the page."));case 29:r=!0,d.next=40;break;case 32:return d.prev=32,d.t0=d.catch(4),s=d.t0.message||Object(E.__)("An error occurred."),u=d.t0 instanceof Error,(b={folder_exists:Object(E.__)("This block is already installed. Try reloading the page."),unable_to_connect_to_filesystem:Object(E.__)("Error installing block. You can reload the page and try again.")})[d.t0.code]&&(u=!0,s=b[d.t0.code]),d.next=40,z(t,s,u);case 40:return d.next=42,F(e.id,!1);case 42:return d.abrupt("return",r);case 43:case"end":return d.stop()}}),N,null,[[4,32]])}function A(e){return w.a.wrap((function(t){for(;;)switch(t.prev=t.next){case 0:return t.prev=0,t.next=3,Object(l.apiFetch)({url:B(e),data:{status:"inactive"},method:"PUT"});case 3:return t.next=5,Object(l.apiFetch)({url:B(e),method:"DELETE"});case 5:return t.next=7,M(e);case 7:t.next=13;break;case 9:return t.prev=9,t.t0=t.catch(0),t.next=13,Object(l.dispatch)("core/notices","createErrorNotice",t.t0.message||Object(E.__)("An error occurred."));case 13:case"end":return t.stop()}}),x,null,[[0,9]])}function R(e){return{type:"ADD_INSTALLED_BLOCK_TYPE",item:e}}function M(e){return{type:"REMOVE_INSTALLED_BLOCK_TYPE",item:e}}function F(e,t){return{type:"SET_INSTALLING_BLOCK",blockId:e,isInstalling:t}}function z(e,t){var n=arguments.length>2&&void 0!==arguments[2]&&arguments[2];return{type:"SET_ERROR_NOTICE",blockId:e,message:t,isFatal:n}}function V(e){return{type:"CLEAR_ERROR_NOTICE",blockId:e}}var K={getDownloadableBlocks:w.a.mark((function e(t){var n,r;return w.a.wrap((function(e){for(;;)switch(e.prev=e.next){case 0:if(t){e.next=2;break}return e.abrupt("return");case 2:return e.prev=2,e.next=5,D(t);case 5:return e.next=7,Object(l.apiFetch)({path:"wp/v2/block-directory/search?term=".concat(t)});case 7:return n=e.sent,r=n.map((function(e){return Object(s.mapKeys)(e,(function(e,t){return Object(s.camelCase)(t)}))})),e.next=11,L(r,t);case 11:e.next=15;break;case 13:e.prev=13,e.t0=e.catch(2);case 15:case"end":return e.stop()}}),e,null,[[2,13]])}))};function $(e,t){var n=Object.keys(e);if(Object.getOwnPropertySymbols){var r=Object.getOwnPropertySymbols(e);t&&(r=r.filter((function(t){return Object.getOwnPropertyDescriptor(e,t).enumerable}))),n.push.apply(n,r)}return n}var H={reducer:d,selectors:r,actions:c,controls:function(e){for(var t=1;t<arguments.length;t++){var n=null!=arguments[t]?arguments[t]:{};t%2?$(Object(n),!0).forEach((function(t){Object(o.a)(e,t,n[t])})):Object.getOwnPropertyDescriptors?Object.defineProperties(e,Object.getOwnPropertyDescriptors(n)):$(Object(n)).forEach((function(t){Object.defineProperty(e,t,Object.getOwnPropertyDescriptor(n,t))}))}return e}({},l.controls,{},S),resolvers:K},U=(Object(a.registerStore)("core/block-directory",H),n(0)),W=n(51),q=n(11);function G(){var e=Object(a.useDispatch)("core/block-directory").uninstallBlockType,t=Object(a.useSelect)((function(e){var t=e("core/editor"),n=t.isAutosavingPost;return(0,t.isSavingPost)()&&!n()}),[]),n=Object(a.useSelect)((function(e){return e("core/block-directory").getUnusedBlockTypes()}),[]);return Object(U.useEffect)((function(){t&&n.length&&n.forEach((function(t){e(t),Object(q.unregisterBlockType)(t.name)}))}),[t]),null}var Y=n(12),J=n(6),Q=n(9),X=n(3);var Z=function(e){var t=e.author,n=e.authorBlockCount,r=e.authorBlockRating;return Object(U.createElement)(U.Fragment,null,Object(U.createElement)("span",{className:"block-directory-downloadable-block-author-info__content-author"},Object(E.sprintf)(
/* translators: %s: author name. */
Object(E.__)("Authored by %s"),t)),Object(U.createElement)("span",{className:"block-directory-downloadable-block-author-info__content"},r>0?Object(E.sprintf)(
/* translators: 1: number of blocks. 2: average rating. */
Object(E._n)("This author has %1$d block, with an average rating of %2$d.","This author has %1$d blocks, with an average rating of %2$d.",n),n,r):Object(E.sprintf)(
/* translators: 1: number of blocks. */
Object(E._n)("This author has %1$d block.","This author has %1$d blocks.",n),n)))},ee=n(120),te=n(166),ne=n(7),re=Object(U.createElement)(ne.SVG,{xmlns:"http://www.w3.org/2000/svg",viewBox:"0 0 24 24"},Object(U.createElement)(ne.Path,{d:"M9.518 8.783a.25.25 0 00.188-.137l2.069-4.192a.25.25 0 01.448 0l2.07 4.192a.25.25 0 00.187.137l4.626.672a.25.25 0 01.139.427l-3.347 3.262a.25.25 0 00-.072.222l.79 4.607a.25.25 0 01-.363.264l-4.137-2.176a.25.25 0 00-.233 0l-4.138 2.175a.25.25 0 01-.362-.263l.79-4.607a.25.25 0 00-.072-.222L4.753 9.882a.25.25 0 01.14-.427l4.625-.672zM12 14.533c.28 0 .559.067.814.2l1.895.997-.362-2.11a1.75 1.75 0 01.504-1.55l1.533-1.495-2.12-.308a1.75 1.75 0 01-1.317-.957L12 7.39v7.143z"})),ce=n(167);var oe=function(e){var t=e.rating,n=.5*Math.round(t/.5),r=Math.floor(t),c=Math.ceil(t-r),o=5-(r+c);return Object(U.createElement)("div",{"aria-label":Object(E.sprintf)(
/* translators: %s: number of stars. */
Object(E.__)("%s out of 5 stars"),n)},Object(s.times)(r,(function(e){return Object(U.createElement)(ee.a,{key:"full_stars_".concat(e),icon:te.a,size:16})})),Object(s.times)(c,(function(e){return Object(U.createElement)(ee.a,{key:"half_stars_".concat(e),icon:re,size:16})})),Object(s.times)(o,(function(e){return Object(U.createElement)(ee.a,{key:"empty_stars_".concat(e),icon:ce.a,size:16})})))},ae=function(e){var t=e.rating,n=e.ratingCount;return Object(U.createElement)("div",{className:"block-directory-block-ratings"},Object(U.createElement)(oe,{rating:t}),Object(U.createElement)("span",{className:"block-directory-block-ratings__rating-count","aria-label":Object(E.sprintf)(// translators: %d: number of ratings (number).
Object(E._n)("%d total rating","%d total ratings",n),n)},"(",n,")"))};var le=function(e){var t=e.icon,n=e.title;return Object(U.createElement)("div",{className:"block-directory-downloadable-block-icon"},null!==t.match(/\.(jpeg|jpg|gif|png|svg)(?:\?.*)?$/)?Object(U.createElement)("img",{src:t,alt:Object(E.sprintf)(// translators: %s: Name of the plugin e.g: "Akismet".
Object(E.__)("%s block icon"),n)}):Object(U.createElement)(J.BlockIcon,{icon:t,showColors:!0}))};var ie=function(e){var t=e.icon,n=e.title,r=e.rating,c=e.ratingCount,o=e.isLoading,a=void 0!==o&&o,l=e.isInstallable,i=void 0===l||l,s=e.onClick;return Object(U.createElement)("div",{className:"block-directory-downloadable-block-header__row"},Object(U.createElement)(le,{icon:t,title:n}),Object(U.createElement)("div",{className:"block-directory-downloadable-block-header__column"},Object(U.createElement)("h2",{className:"block-directory-downloadable-block-header__title"},n),Object(U.createElement)(ae,{rating:r,ratingCount:c})),Object(U.createElement)(X.Button,{isSecondary:!0,isBusy:a,disabled:a||!i,onClick:function(e){e.preventDefault(),!a&&i&&s()}},a?Object(E.__)("Adding…"):Object(E.__)("Add block")))},se=Object(U.createElement)(ne.SVG,{xmlns:"http://www.w3.org/2000/svg",viewBox:"-2 -2 24 24"},Object(U.createElement)(ne.Path,{d:"M18 3.5c0 .62-.38 1.16-.92 1.38v13.11H1.99l4.22-6.73c-.13-.23-.21-.48-.21-.76C6 9.67 6.67 9 7.5 9S9 9.67 9 10.5c0 .13-.02.25-.05.37l1.44.63c.27-.3.67-.5 1.11-.5.18 0 .35.04.51.09l3.58-6.41c-.36-.27-.59-.7-.59-1.18 0-.83.67-1.5 1.5-1.5.19 0 .36.04.53.1l.05-.09v.11c.54.22.92.76.92 1.38zm-1.92 13.49V5.85l-3.29 5.89c.13.23.21.48.21.76 0 .83-.67 1.5-1.5 1.5s-1.5-.67-1.5-1.5l.01-.07-1.63-.72c-.25.18-.55.29-.88.29-.18 0-.35-.04-.51-.1l-3.2 5.09h12.29z"})),ue=n(264);var be=function(e){var t=e.description,n=e.activeInstalls,r=e.humanizedUpdated;return Object(U.createElement)(U.Fragment,null,Object(U.createElement)("p",{className:"block-directory-downloadable-block-info__content"},t),Object(U.createElement)("div",{className:"block-directory-downloadable-block-info__meta"},Object(U.createElement)(ee.a,{className:"block-directory-downloadable-block-info__icon",icon:se}),Object(E.sprintf)(
/* translators: %s: number of active installations. */
Object(E._n)("%d active installation","%d active installations",n),n)),Object(U.createElement)("div",{className:"block-directory-downloadable-block-info__meta"},Object(U.createElement)(ee.a,{className:"block-directory-downloadable-block-info__icon",icon:ue.a}),// translators: %s: Humanized date of last update e.g: "2 months ago".
Object(E.sprintf)(Object(E.__)("Updated %s"),r)))},de=function(e){var t=e.block,n=e.onClick,r=Object(a.useSelect)((function(e){return e("core/block-directory").getErrorNoticeForBlock(t.id)}),[t]);return r?Object(U.createElement)(X.Notice,{status:"error",isDismissible:!1,className:"block-directory-downloadable-block-notice"},Object(U.createElement)("div",{className:"block-directory-downloadable-block-notice__content"},r.message),Object(U.createElement)(X.Button,{isSmall:!0,isPrimary:!0,onClick:function(){if(r.isFatal)return window.location.reload(),!1;n(t)}},r.isFatal?Object(E.__)("Reload"):Object(E.__)("Retry"))):null};function fe(e){var t=e.item,n=e.onClick,r=Object(a.useSelect)((function(e){var n=e("core/block-directory"),r=n.isInstalling,c=(0,n.getErrorNoticeForBlock)(t.id),o=c&&c.isFatal;return{isLoading:r(t.id),isInstallable:!o}}),[t]),c=r.isLoading,o=r.isInstallable,l=t.icon,i=t.title,s=t.description,u=t.rating,b=t.activeInstalls,d=t.ratingCount,f=t.author,O=t.humanizedUpdated,p=t.authorBlockCount,m=t.authorBlockRating;return Object(U.createElement)("li",{className:"block-directory-downloadable-block-list-item"},Object(U.createElement)("article",{className:"block-directory-downloadable-block-list-item__panel"},Object(U.createElement)("header",{className:"block-directory-downloadable-block-list-item__header"},Object(U.createElement)(ie,{icon:l,onClick:n,title:i,rating:u,ratingCount:d,isLoading:c,isInstallable:o})),Object(U.createElement)("section",{className:"block-directory-downloadable-block-list-item__body"},Object(U.createElement)(de,{onClick:n,block:t}),Object(U.createElement)(be,{activeInstalls:b,description:s,humanizedUpdated:O})),Object(U.createElement)("footer",{className:"block-directory-downloadable-block-list-item__footer"},Object(U.createElement)(Z,{author:f,authorBlockCount:p,authorBlockRating:m}))))}var Oe=function(e){var t=e.items,n=e.onHover,r=void 0===n?s.noop:n,c=e.onSelect,o=Object(a.useDispatch)("core/block-directory").installBlockType;return t.length?Object(U.createElement)("ul",{role:"list",className:"block-directory-downloadable-blocks-list"},t.map((function(e){return Object(U.createElement)(fe,{key:e.id,onClick:function(){o(e).then((function(t){t&&c(e)})),r(null)},item:e})}))):null};var pe=Object(Q.compose)([X.withSpokenMessages,Object(a.withSelect)((function(e,t){var n=t.filterValue,r=e("core/block-directory"),c=r.getDownloadableBlocks,o=r.isRequestingDownloadableBlocks,a=e("core").canUser("read","block-directory/search");return{downloadableItems:a?c(n):[],hasPermission:a,isLoading:o(n)}}))])((function(e){var t=e.downloadableItems,n=e.onSelect,r=e.onHover,c=e.hasPermission,o=e.isLoading,a=e.isWaiting,l=e.debouncedSpeak;return!1===c?(l(Object(E.__)("No blocks found in your library. Please contact your site administrator to install new blocks.")),Object(U.createElement)("p",{className:"block-directory-downloadable-blocks-panel__description has-no-results"},Object(E.__)("No blocks found in your library."),Object(U.createElement)("br",null),Object(E.__)("Please contact your site administrator to install new blocks."))):void 0===c||o||a?Object(U.createElement)("p",{className:"block-directory-downloadable-blocks-panel__description has-no-results"},Object(U.createElement)(X.Spinner,null)):t.length?(l(Object(E.sprintf)(
/* translators: %s: number of available blocks. */
Object(E._n)("No blocks found in your library. We did find %d block available for download.","No blocks found in your library. We did find %d blocks available for download.",t.length),t.length)),Object(U.createElement)(U.Fragment,null,Object(U.createElement)("p",{className:"block-directory-downloadable-blocks-panel__description"},Object(E.__)("No blocks found in your library. These blocks can be downloaded and installed:")),Object(U.createElement)(Oe,{items:t,onSelect:n,onHover:r}))):Object(U.createElement)("p",{className:"block-directory-downloadable-blocks-panel__description has-no-results"},Object(E.__)("No blocks found in your library."))}));var me=function(){var e=Object(U.useState)(""),t=Object(Y.a)(e,2),n=t[0],r=t[1],c=Object(s.debounce)(r,400);return Object(U.createElement)(J.__experimentalInserterMenuExtension,null,(function(e){var t=e.onSelect,r=e.onHover,o=e.filterValue;return e.hasItems||!o?null:(n!==o&&c(o),Object(U.createElement)(pe,{onSelect:t,onHover:r,filterValue:n,isWaiting:o!==n}))}))},je=n(241);function ye(e){var t=e.items;return t.length?Object(U.createElement)("ul",{className:"block-directory-compact-list"},t.map((function(e){var t=e.icon,n=e.id,r=e.title,c=e.author;return Object(U.createElement)("li",{key:n,className:"block-directory-compact-list__item"},Object(U.createElement)(le,{icon:t,title:r}),Object(U.createElement)("div",{className:"block-directory-compact-list__item-details"},Object(U.createElement)("div",{className:"block-directory-compact-list__item-title"},r),Object(U.createElement)("div",{className:"block-directory-compact-list__item-author"},Object(E.sprintf)(
/* translators: %s: Name of the block author. */
Object(E.__)("By %s"),c))))}))):null}function he(){var e=Object(a.useSelect)((function(e){return e("core/block-directory").getNewBlockTypes()}),[]);return e.length?Object(U.createElement)(je.PluginPrePublishPanel,{icon:"block-default",title:Object(E.sprintf)(// translators: %d: number of blocks (number).
Object(E._n)("Added: %d block","Added: %d blocks",e.length),e.length),initialOpen:!0},Object(U.createElement)("p",{className:"installed-blocks-pre-publish-panel__copy"},Object(E._n)("The following block has been added to your site.","The following blocks have been added to your site.",e.length)),Object(U.createElement)(ye,{items:e})):null}Object(W.registerPlugin)("block-directory",{render:function(){return Object(U.createElement)(U.Fragment,null,Object(U.createElement)(G,null),Object(U.createElement)(me,null),Object(U.createElement)(he,null))}})},4:function(e,t){!function(){e.exports=this.wp.data}()},41:function(e,t,n){"use strict";function r(e,t){if(null==e)return{};var n,r,c={},o=Object.keys(e);for(r=0;r<o.length;r++)n=o[r],t.indexOf(n)>=0||(c[n]=e[n]);return c}n.d(t,"a",(function(){return r}))},5:function(e,t,n){"use strict";function r(e,t,n){return t in e?Object.defineProperty(e,t,{value:n,enumerable:!0,configurable:!0,writable:!0}):e[t]=n,e}n.d(t,"a",(function(){return r}))},51:function(e,t){!function(){e.exports=this.wp.plugins}()},6:function(e,t){!function(){e.exports=this.wp.blockEditor}()},69:function(e,t){!function(){e.exports=this.wp.notices}()},7:function(e,t){!function(){e.exports=this.wp.primitives}()},9:function(e,t){!function(){e.exports=this.wp.compose}()}});