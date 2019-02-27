// ProgressBar.js 0.8.1
// https://kimmobrunfeldt.github.io/progressbar.js
// License: MIT

!function(a){if("object"==typeof exports&&"undefined"!=typeof module)module.exports=a();else if("function"==typeof define&&define.amd)define([],a);else{var b;b="undefined"!=typeof window?window:"undefined"!=typeof global?global:"undefined"!=typeof self?self:this,b.ProgressBar=a()}}(function(){var a;return function b(a,c,d){function e(g,h){if(!c[g]){if(!a[g]){var i="function"==typeof require&&require;if(!h&&i)return i(g,!0);if(f)return f(g,!0);var j=new Error("Cannot find module '"+g+"'");throw j.code="MODULE_NOT_FOUND",j}var k=c[g]={exports:{}};a[g][0].call(k.exports,function(b){var c=a[g][1][b];return e(c?c:b)},k,k.exports,b,a,c,d)}return c[g].exports}for(var f="function"==typeof require&&require,g=0;g<d.length;g++)e(d[g]);return e}({1:[function(b,c,d){!function(b){"undefined"==typeof SHIFTY_DEBUG_NOW&&(SHIFTY_DEBUG_NOW=function(){return+new Date});var e=function(){"use strict";function e(){}function f(a,b){var c;for(c in a)Object.hasOwnProperty.call(a,c)&&b(c)}function g(a,b){return f(b,function(c){a[c]=b[c]}),a}function h(a,b){f(b,function(c){"undefined"==typeof a[c]&&(a[c]=b[c])})}function i(a,b,c,d,e,f,g){var h,i=(a-f)/e;for(h in b)b.hasOwnProperty(h)&&(b[h]=j(c[h],d[h],o[g[h]],i));return b}function j(a,b,c,d){return a+(b-a)*c(d)}function k(a,b){var c=n.prototype.filter,d=a._filterArgs;f(c,function(e){"undefined"!=typeof c[e][b]&&c[e][b].apply(a,d)})}function l(a,b,c,d,e,f,g,h,j){v=b+c,w=Math.min(u(),v),x=w>=v,a.isPlaying()&&!x?(j(a._timeoutHandler,s),k(a,"beforeTween"),i(w,d,e,f,c,b,g),k(a,"afterTween"),h(d)):x&&(h(f),a.stop(!0))}function m(a,b){var c={};return"string"==typeof b?f(a,function(a){c[a]=b}):f(a,function(a){c[a]||(c[a]=b[a]||q)}),c}function n(a,b){this._currentState=a||{},this._configured=!1,this._scheduleFunction=p,"undefined"!=typeof b&&this.setConfig(b)}var o,p,q="linear",r=500,s=1e3/60,t=Date.now?Date.now:function(){return+new Date},u=SHIFTY_DEBUG_NOW?SHIFTY_DEBUG_NOW:t;p="undefined"!=typeof window?window.requestAnimationFrame||window.webkitRequestAnimationFrame||window.oRequestAnimationFrame||window.msRequestAnimationFrame||window.mozCancelRequestAnimationFrame&&window.mozRequestAnimationFrame||setTimeout:setTimeout;var v,w,x;return n.prototype.tween=function(a){return this._isTweening?this:(void 0===a&&this._configured||this.setConfig(a),this._start(this.get()),this.resume())},n.prototype.setConfig=function(a){a=a||{},this._configured=!0,this._pausedAtTime=null,this._start=a.start||e,this._step=a.step||e,this._finish=a.finish||e,this._duration=a.duration||r,this._currentState=a.from||this.get(),this._originalState=this.get(),this._targetState=a.to||this.get(),this._timestamp=u();var b=this._currentState,c=this._targetState;return h(c,b),this._easing=m(b,a.easing||q),this._filterArgs=[b,this._originalState,c,this._easing],k(this,"tweenCreated"),this},n.prototype.get=function(){return g({},this._currentState)},n.prototype.set=function(a){this._currentState=a},n.prototype.pause=function(){return this._pausedAtTime=u(),this._isPaused=!0,this},n.prototype.resume=function(){this._isPaused&&(this._timestamp+=u()-this._pausedAtTime),this._isPaused=!1,this._isTweening=!0;var a=this;return this._timeoutHandler=function(){l(a,a._timestamp,a._duration,a._currentState,a._originalState,a._targetState,a._easing,a._step,a._scheduleFunction)},this._timeoutHandler(),this},n.prototype.stop=function(a){return this._isTweening=!1,this._isPaused=!1,this._timeoutHandler=e,a&&(g(this._currentState,this._targetState),k(this,"afterTweenEnd"),this._finish.call(this,this._currentState)),this},n.prototype.isPlaying=function(){return this._isTweening&&!this._isPaused},n.prototype.setScheduleFunction=function(a){this._scheduleFunction=a},n.prototype.dispose=function(){var a;for(a in this)this.hasOwnProperty(a)&&delete this[a]},n.prototype.filter={},n.prototype.formula={linear:function(a){return a}},o=n.prototype.formula,g(n,{now:u,each:f,tweenProps:i,tweenProp:j,applyFilter:k,shallowCopy:g,defaults:h,composeEasingObject:m}),"function"==typeof SHIFTY_DEBUG_NOW&&(b.timeoutHandler=l),"object"==typeof d?c.exports=n:"function"==typeof a&&a.amd?a(function(){return n}):"undefined"==typeof b.Tweenable&&(b.Tweenable=n),n}();!function(){e.shallowCopy(e.prototype.formula,{easeInQuad:function(a){return Math.pow(a,2)},easeOutQuad:function(a){return-(Math.pow(a-1,2)-1)},easeInOutQuad:function(a){return(a/=.5)<1?.5*Math.pow(a,2):-.5*((a-=2)*a-2)},easeInCubic:function(a){return Math.pow(a,3)},easeOutCubic:function(a){return Math.pow(a-1,3)+1},easeInOutCubic:function(a){return(a/=.5)<1?.5*Math.pow(a,3):.5*(Math.pow(a-2,3)+2)},easeInQuart:function(a){return Math.pow(a,4)},easeOutQuart:function(a){return-(Math.pow(a-1,4)-1)},easeInOutQuart:function(a){return(a/=.5)<1?.5*Math.pow(a,4):-.5*((a-=2)*Math.pow(a,3)-2)},easeInQuint:function(a){return Math.pow(a,5)},easeOutQuint:function(a){return Math.pow(a-1,5)+1},easeInOutQuint:function(a){return(a/=.5)<1?.5*Math.pow(a,5):.5*(Math.pow(a-2,5)+2)},easeInSine:function(a){return-Math.cos(a*(Math.PI/2))+1},easeOutSine:function(a){return Math.sin(a*(Math.PI/2))},easeInOutSine:function(a){return-.5*(Math.cos(Math.PI*a)-1)},easeInExpo:function(a){return 0===a?0:Math.pow(2,10*(a-1))},easeOutExpo:function(a){return 1===a?1:-Math.pow(2,-10*a)+1},easeInOutExpo:function(a){return 0===a?0:1===a?1:(a/=.5)<1?.5*Math.pow(2,10*(a-1)):.5*(-Math.pow(2,-10*--a)+2)},easeInCirc:function(a){return-(Math.sqrt(1-a*a)-1)},easeOutCirc:function(a){return Math.sqrt(1-Math.pow(a-1,2))},easeInOutCirc:function(a){return(a/=.5)<1?-.5*(Math.sqrt(1-a*a)-1):.5*(Math.sqrt(1-(a-=2)*a)+1)},easeOutBounce:function(a){return 1/2.75>a?7.5625*a*a:2/2.75>a?7.5625*(a-=1.5/2.75)*a+.75:2.5/2.75>a?7.5625*(a-=2.25/2.75)*a+.9375:7.5625*(a-=2.625/2.75)*a+.984375},easeInBack:function(a){var b=1.70158;return a*a*((b+1)*a-b)},easeOutBack:function(a){var b=1.70158;return(a-=1)*a*((b+1)*a+b)+1},easeInOutBack:function(a){var b=1.70158;return(a/=.5)<1?.5*a*a*(((b*=1.525)+1)*a-b):.5*((a-=2)*a*(((b*=1.525)+1)*a+b)+2)},elastic:function(a){return-1*Math.pow(4,-8*a)*Math.sin(2*(6*a-1)*Math.PI/2)+1},swingFromTo:function(a){var b=1.70158;return(a/=.5)<1?.5*a*a*(((b*=1.525)+1)*a-b):.5*((a-=2)*a*(((b*=1.525)+1)*a+b)+2)},swingFrom:function(a){var b=1.70158;return a*a*((b+1)*a-b)},swingTo:function(a){var b=1.70158;return(a-=1)*a*((b+1)*a+b)+1},bounce:function(a){return 1/2.75>a?7.5625*a*a:2/2.75>a?7.5625*(a-=1.5/2.75)*a+.75:2.5/2.75>a?7.5625*(a-=2.25/2.75)*a+.9375:7.5625*(a-=2.625/2.75)*a+.984375},bouncePast:function(a){return 1/2.75>a?7.5625*a*a:2/2.75>a?2-(7.5625*(a-=1.5/2.75)*a+.75):2.5/2.75>a?2-(7.5625*(a-=2.25/2.75)*a+.9375):2-(7.5625*(a-=2.625/2.75)*a+.984375)},easeFromTo:function(a){return(a/=.5)<1?.5*Math.pow(a,4):-.5*((a-=2)*Math.pow(a,3)-2)},easeFrom:function(a){return Math.pow(a,4)},easeTo:function(a){return Math.pow(a,.25)}})}(),function(){function a(a,b,c,d,e,f){function g(a){return((n*a+o)*a+p)*a}function h(a){return((q*a+r)*a+s)*a}function i(a){return(3*n*a+2*o)*a+p}function j(a){return 1/(200*a)}function k(a,b){return h(m(a,b))}function l(a){return a>=0?a:0-a}function m(a,b){var c,d,e,f,h,j;for(e=a,j=0;8>j;j++){if(f=g(e)-a,l(f)<b)return e;if(h=i(e),l(h)<1e-6)break;e-=f/h}if(c=0,d=1,e=a,c>e)return c;if(e>d)return d;for(;d>c;){if(f=g(e),l(f-a)<b)return e;a>f?c=e:d=e,e=.5*(d-c)+c}return e}var n=0,o=0,p=0,q=0,r=0,s=0;return p=3*b,o=3*(d-b)-p,n=1-p-o,s=3*c,r=3*(e-c)-s,q=1-s-r,k(a,j(f))}function b(b,c,d,e){return function(f){return a(f,b,c,d,e,1)}}e.setBezierFunction=function(a,c,d,f,g){var h=b(c,d,f,g);return h.x1=c,h.y1=d,h.x2=f,h.y2=g,e.prototype.formula[a]=h},e.unsetBezierFunction=function(a){delete e.prototype.formula[a]}}(),function(){function a(a,b,c,d,f){return e.tweenProps(d,b,a,c,1,0,f)}var b=new e;b._filterArgs=[],e.interpolate=function(c,d,f,g){var h=e.shallowCopy({},c),i=e.composeEasingObject(c,g||"linear");b.set({});var j=b._filterArgs;j.length=0,j[0]=h,j[1]=c,j[2]=d,j[3]=i,e.applyFilter(b,"tweenCreated"),e.applyFilter(b,"beforeTween");var k=a(c,h,d,f,i);return e.applyFilter(b,"afterTween"),k}}(),function(a){function b(a,b){B.length=0;var c,d=a.length;for(c=0;d>c;c++)B.push("_"+b+"_"+c);return B}function c(a){var b=a.match(v);return b?(1===b.length||a[0].match(u))&&b.unshift(""):b=["",""],b.join(A)}function d(b){a.each(b,function(a){var c=b[a];"string"==typeof c&&c.match(z)&&(b[a]=e(c))})}function e(a){return i(z,a,f)}function f(a){var b=g(a);return"rgb("+b[0]+","+b[1]+","+b[2]+")"}function g(a){return a=a.replace(/#/,""),3===a.length&&(a=a.split(""),a=a[0]+a[0]+a[1]+a[1]+a[2]+a[2]),C[0]=h(a.substr(0,2)),C[1]=h(a.substr(2,2)),C[2]=h(a.substr(4,2)),C}function h(a){return parseInt(a,16)}function i(a,b,c){var d=b.match(a),e=b.replace(a,A);if(d)for(var f,g=d.length,h=0;g>h;h++)f=d.shift(),e=e.replace(A,c(f));return e}function j(a){return i(x,a,k)}function k(a){for(var b=a.match(w),c=b.length,d=a.match(y)[0],e=0;c>e;e++)d+=parseInt(b[e],10)+",";return d=d.slice(0,-1)+")"}function l(d){var e={};return a.each(d,function(a){var f=d[a];if("string"==typeof f){var g=r(f);e[a]={formatString:c(f),chunkNames:b(g,a)}}}),e}function m(b,c){a.each(c,function(a){for(var d=b[a],e=r(d),f=e.length,g=0;f>g;g++)b[c[a].chunkNames[g]]=+e[g];delete b[a]})}function n(b,c){a.each(c,function(a){var d=b[a],e=o(b,c[a].chunkNames),f=p(e,c[a].chunkNames);d=q(c[a].formatString,f),b[a]=j(d)})}function o(a,b){for(var c,d={},e=b.length,f=0;e>f;f++)c=b[f],d[c]=a[c],delete a[c];return d}function p(a,b){D.length=0;for(var c=b.length,d=0;c>d;d++)D.push(a[b[d]]);return D}function q(a,b){for(var c=a,d=b.length,e=0;d>e;e++)c=c.replace(A,+b[e].toFixed(4));return c}function r(a){return a.match(w)}function s(b,c){a.each(c,function(a){for(var d=c[a],e=d.chunkNames,f=e.length,g=b[a].split(" "),h=g[g.length-1],i=0;f>i;i++)b[e[i]]=g[i]||h;delete b[a]})}function t(b,c){a.each(c,function(a){for(var d=c[a],e=d.chunkNames,f=e.length,g="",h=0;f>h;h++)g+=" "+b[e[h]],delete b[e[h]];b[a]=g.substr(1)})}var u=/(\d|\-|\.)/,v=/([^\-0-9\.]+)/g,w=/[0-9.\-]+/g,x=new RegExp("rgb\\("+w.source+/,\s*/.source+w.source+/,\s*/.source+w.source+"\\)","g"),y=/^.*\(/,z=/#([0-9]|[a-f]){3,6}/gi,A="VAL",B=[],C=[],D=[];a.prototype.filter.token={tweenCreated:function(a,b,c){d(a),d(b),d(c),this._tokenData=l(a)},beforeTween:function(a,b,c,d){s(d,this._tokenData),m(a,this._tokenData),m(b,this._tokenData),m(c,this._tokenData)},afterTween:function(a,b,c,d){n(a,this._tokenData),n(b,this._tokenData),n(c,this._tokenData),t(d,this._tokenData)}}}(e)}(this)},{}],2:[function(a,b){var c=a("./shape"),d=a("./utils"),e=function(){this._pathTemplate="M 50,50 m 0,-{radius} a {radius},{radius} 0 1 1 0,{2radius} a {radius},{radius} 0 1 1 0,-{2radius}",c.apply(this,arguments)};e.prototype=new c,e.prototype.constructor=e,e.prototype._pathString=function(a){var b=a.strokeWidth;a.trailWidth&&a.trailWidth>a.strokeWidth&&(b=a.trailWidth);var c=50-b/2;return d.render(this._pathTemplate,{radius:c,"2radius":2*c})},e.prototype._trailString=function(a){return this._pathString(a)},b.exports=e},{"./shape":6,"./utils":8}],3:[function(a,b){var c=a("./shape"),d=a("./utils"),e=function(){this._pathTemplate="M 0,{center} L 100,{center}",c.apply(this,arguments)};e.prototype=new c,e.prototype.constructor=e,e.prototype._initializeSvg=function(a,b){a.setAttribute("viewBox","0 0 100 "+b.strokeWidth),a.setAttribute("preserveAspectRatio","none")},e.prototype._pathString=function(a){return d.render(this._pathTemplate,{center:a.strokeWidth/2})},e.prototype._trailString=function(a){return this._pathString(a)},b.exports=e},{"./shape":6,"./utils":8}],4:[function(a,b){var c=a("./line"),d=a("./circle"),e=a("./square"),f=a("./path");b.exports={Line:c,Circle:d,Square:e,Path:f}},{"./circle":2,"./line":3,"./path":5,"./square":7}],5:[function(a,b){var c=a("shifty"),d=a("./utils"),e={easeIn:"easeInCubic",easeOut:"easeOutCubic",easeInOut:"easeInOutCubic"},f=function(a,b){b=d.extend({duration:800,easing:"linear",from:{},to:{},step:function(){}},b);var c;c=d.isString(a)?document.querySelector(a):a,this.path=c,this._opts=b,this._tweenable=null;var e=this.path.getTotalLength();this.path.style.strokeDasharray=e+" "+e,this.set(0)};f.prototype.value=function(){var a=this._getComputedDashOffset(),b=this.path.getTotalLength(),c=1-a/b;return parseFloat(c.toFixed(6),10)},f.prototype.set=function(a){this.stop(),this.path.style.strokeDashoffset=this._progressToOffset(a);var b=this._opts.step;if(d.isFunction(b)){var c=this._easing(this._opts.easing),e=this._calculateTo(a,c);b(e,this._opts.shape||this,this._opts.attachment)}},f.prototype.stop=function(){this._stopTween(),this.path.style.strokeDashoffset=this._getComputedDashOffset()},f.prototype.animate=function(a,b,e){b=b||{},d.isFunction(b)&&(e=b,b={});var f=d.extend({},b),g=d.extend({},this._opts);b=d.extend(g,b);var h=this._easing(b.easing),i=this._resolveFromAndTo(a,h,f);this.stop(),this.path.getBoundingClientRect();var j=this._getComputedDashOffset(),k=this._progressToOffset(a),l=this;this._tweenable=new c,this._tweenable.tween({from:d.extend({offset:j},i.from),to:d.extend({offset:k},i.to),duration:b.duration,easing:h,step:function(a){l.path.style.strokeDashoffset=a.offset,b.step(a,b.shape||l,b.attachment)},finish:function(){d.isFunction(e)&&e()}})},f.prototype._getComputedDashOffset=function(){var a=window.getComputedStyle(this.path,null);return parseFloat(a.getPropertyValue("stroke-dashoffset"),10)},f.prototype._progressToOffset=function(a){var b=this.path.getTotalLength();return b-a*b},f.prototype._resolveFromAndTo=function(a,b,c){return c.from&&c.to?{from:c.from,to:c.to}:{from:this._calculateFrom(b),to:this._calculateTo(a,b)}},f.prototype._calculateFrom=function(a){return c.interpolate(this._opts.from,this._opts.to,this.value(),a)},f.prototype._calculateTo=function(a,b){return c.interpolate(this._opts.from,this._opts.to,a,b)},f.prototype._stopTween=function(){null!==this._tweenable&&(this._tweenable.stop(),this._tweenable.dispose(),this._tweenable=null)},f.prototype._easing=function(a){return e.hasOwnProperty(a)?e[a]:a},b.exports=f},{"./utils":8,shifty:1}],6:[function(a,b){var c=a("./path"),d=a("./utils"),e="Object is destroyed",f=function g(a,b){if(!(this instanceof g))throw new Error("Constructor was called without new keyword");if(0!==arguments.length){this._opts=d.extend({color:"#555",strokeWidth:1,trailColor:null,trailWidth:null,fill:null,text:{autoStyle:!0,color:null,value:"",className:"progressbar-text"}},b,!0);var e,f=this._createSvgView(this._opts);if(e=d.isString(a)?document.querySelector(a):a,!e)throw new Error("Container does not exist: "+a);this._container=e,this._container.appendChild(f.svg),this.text=null,this._opts.text.value&&(this.text=this._createTextElement(this._opts,this._container),this._container.appendChild(this.text)),this.svg=f.svg,this.path=f.path,this.trail=f.trail;var h=d.extend({attachment:void 0,shape:this},this._opts);this._progressPath=new c(f.path,h)}};f.prototype.animate=function(a,b,c){if(null===this._progressPath)throw new Error(e);this._progressPath.animate(a,b,c)},f.prototype.stop=function(){if(null===this._progressPath)throw new Error(e);void 0!==this._progressPath&&this._progressPath.stop()},f.prototype.destroy=function(){if(null===this._progressPath)throw new Error(e);this.stop(),this.svg.parentNode.removeChild(this.svg),this.svg=null,this.path=null,this.trail=null,this._progressPath=null,null!==this.text&&(this.text.parentNode.removeChild(this.text),this.text=null)},f.prototype.set=function(a){if(null===this._progressPath)throw new Error(e);this._progressPath.set(a)},f.prototype.value=function(){if(null===this._progressPath)throw new Error(e);return void 0===this._progressPath?0:this._progressPath.value()},f.prototype.setText=function(a){if(null===this._progressPath)throw new Error(e);null===this.text&&(this.text=this._createTextElement(this._opts,this._container),this._container.appendChild(this.text)),this.text.removeChild(this.text.firstChild),this.text.appendChild(document.createTextNode(a))},f.prototype._createSvgView=function(a){var b=document.createElementNS("http://www.w3.org/2000/svg","svg");this._initializeSvg(b,a);var c=null;(a.trailColor||a.trailWidth)&&(c=this._createTrail(a),b.appendChild(c));var d=this._createPath(a);return b.appendChild(d),{svg:b,path:d,trail:c}},f.prototype._initializeSvg=function(a){a.setAttribute("viewBox","0 0 100 100")},f.prototype._createPath=function(a){var b=this._pathString(a);return this._createPathElement(b,a)},f.prototype._createTrail=function(a){var b=this._trailString(a),c=d.extend({},a);return c.trailColor||(c.trailColor="#eee"),c.trailWidth||(c.trailWidth=c.strokeWidth),c.color=c.trailColor,c.strokeWidth=c.trailWidth,c.fill=null,this._createPathElement(b,c)},f.prototype._createPathElement=function(a,b){var c=document.createElementNS("http://www.w3.org/2000/svg","path");return c.setAttribute("d",a),c.setAttribute("stroke",b.color),c.setAttribute("stroke-width",b.strokeWidth),b.fill?c.setAttribute("fill",b.fill):c.setAttribute("fill-opacity","0"),c},f.prototype._createTextElement=function(a,b){var c=document.createElement("p");return c.appendChild(document.createTextNode(a.text.value)),a.text.autoStyle&&(b.style.position="relative",c.style.position="absolute",c.style.top="50%",c.style.left="50%",c.style.padding=0,c.style.margin=0,d.setStyle(c,"transform","translate(-50%, -50%)"),c.style.color=a.text.color?a.text.color:a.color),c.className=a.text.className,c},f.prototype._pathString=function(){throw new Error("Override this function for each progress bar")},f.prototype._trailString=function(){throw new Error("Override this function for each progress bar")},b.exports=f},{"./path":5,"./utils":8}],7:[function(a,b){var c=a("./shape"),d=a("./utils"),e=function(){this._pathTemplate="M 0,{halfOfStrokeWidth} L {width},{halfOfStrokeWidth} L {width},{width} L {halfOfStrokeWidth},{width} L {halfOfStrokeWidth},{strokeWidth}",this._trailTemplate="M {startMargin},{halfOfStrokeWidth} L {width},{halfOfStrokeWidth} L {width},{width} L {halfOfStrokeWidth},{width} L {halfOfStrokeWidth},{halfOfStrokeWidth}",c.apply(this,arguments)};e.prototype=new c,e.prototype.constructor=e,e.prototype._pathString=function(a){var b=100-a.strokeWidth/2;return d.render(this._pathTemplate,{width:b,strokeWidth:a.strokeWidth,halfOfStrokeWidth:a.strokeWidth/2})},e.prototype._trailString=function(a){var b=100-a.strokeWidth/2;return d.render(this._trailTemplate,{width:b,strokeWidth:a.strokeWidth,halfOfStrokeWidth:a.strokeWidth/2,startMargin:a.strokeWidth/2-a.trailWidth/2})},b.exports=e},{"./shape":6,"./utils":8}],8:[function(a,b){function c(a,b,d){a=a||{},b=b||{},d=d||!1;for(var e in b)if(b.hasOwnProperty(e)){var f=a[e],g=b[e];a[e]=d&&j(f)&&j(g)?c(f,g,d):g}return a}function d(a,b){var c=a;for(var d in b)if(b.hasOwnProperty(d)){var e=b[d],f="\\{"+d+"\\}",g=new RegExp(f,"g");c=c.replace(g,e)}return c}function e(a,b,c){for(var d=0;d<k.length;++d){var e=k[d];a.style[e+f(b)]=c}a.style[b]=c}function f(a){return a.charAt(0).toUpperCase()+a.slice(1)}function g(a){return"string"==typeof a||a instanceof String}function h(a){return"function"==typeof a}function i(a){return"[object Array]"===Object.prototype.toString.call(a)}function j(a){if(i(a))return!1;var b=typeof a;return"object"===b&&!!a}var k="Webkit Moz O ms".split(" ");b.exports={extend:c,render:d,setStyle:e,capitalize:f,isString:g,isFunction:h,isObject:j}},{}]},{},[4])(4)});