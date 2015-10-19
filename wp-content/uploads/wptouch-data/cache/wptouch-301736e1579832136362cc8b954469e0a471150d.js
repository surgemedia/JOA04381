//fgnass.github.com/spin.js#v1.2.7
!function(e,t,n){function o(e,n){var r=t.createElement(e||"div"),i;for(i in n)r[i]=n[i];return r}function u(e){for(var t=1,n=arguments.length;t<n;t++)e.appendChild(arguments[t]);return e}function f(e,t,n,r){var o=["opacity",t,~~(e*100),n,r].join("-"),u=.01+n/r*100,f=Math.max(1-(1-e)/t*(100-u),e),l=s.substring(0,s.indexOf("Animation")).toLowerCase(),c=l&&"-"+l+"-"||"";return i[o]||(a.insertRule("@"+c+"keyframes "+o+"{"+"0%{opacity:"+f+"}"+u+"%{opacity:"+e+"}"+(u+.01)+"%{opacity:1}"+(u+t)%100+"%{opacity:"+e+"}"+"100%{opacity:"+f+"}"+"}",a.cssRules.length),i[o]=1),o}function l(e,t){var i=e.style,s,o;if(i[t]!==n)return t;t=t.charAt(0).toUpperCase()+t.slice(1);for(o=0;o<r.length;o++){s=r[o]+t;if(i[s]!==n)return s}}function c(e,t){for(var n in t)e.style[l(e,n)||n]=t[n];return e}function h(e){for(var t=1;t<arguments.length;t++){var r=arguments[t];for(var i in r)e[i]===n&&(e[i]=r[i])}return e}function p(e){var t={x:e.offsetLeft,y:e.offsetTop};while(e=e.offsetParent)t.x+=e.offsetLeft,t.y+=e.offsetTop;return t}var r=["webkit","Moz","ms","O"],i={},s,a=function(){var e=o("style",{type:"text/css"});return u(t.getElementsByTagName("head")[0],e),e.sheet||e.styleSheet}(),d={lines:12,length:7,width:5,radius:10,rotate:0,corners:1,color:"#000",speed:1,trail:100,opacity:.25,fps:20,zIndex:2e9,className:"spinner",top:"auto",left:"auto",position:"relative"},v=function m(e){if(!this.spin)return new m(e);this.opts=h(e||{},m.defaults,d)};v.defaults={},h(v.prototype,{spin:function(e){this.stop();var t=this,n=t.opts,r=t.el=c(o(0,{className:n.className}),{position:n.position,width:0,zIndex:n.zIndex}),i=n.radius+n.length+n.width,u,a;e&&(e.insertBefore(r,e.firstChild||null),a=p(e),u=p(r),c(r,{left:(n.left=="auto"?a.x-u.x+(e.offsetWidth>>1):parseInt(n.left,10)+i)+"px",top:(n.top=="auto"?a.y-u.y+(e.offsetHeight>>1):parseInt(n.top,10)+i)+"px"})),r.setAttribute("aria-role","progressbar"),t.lines(r,t.opts);if(!s){var f=0,l=n.fps,h=l/n.speed,d=(1-n.opacity)/(h*n.trail/100),v=h/n.lines;(function m(){f++;for(var e=n.lines;e;e--){var i=Math.max(1-(f+e*v)%h*d,n.opacity);t.opacity(r,n.lines-e,i,n)}t.timeout=t.el&&setTimeout(m,~~(1e3/l))})()}return t},stop:function(){var e=this.el;return e&&(clearTimeout(this.timeout),e.parentNode&&e.parentNode.removeChild(e),this.el=n),this},lines:function(e,t){function i(e,r){return c(o(),{position:"absolute",width:t.length+t.width+"px",height:t.width+"px",background:e,boxShadow:r,transformOrigin:"left",transform:"rotate("+~~(360/t.lines*n+t.rotate)+"deg) translate("+t.radius+"px"+",0)",borderRadius:(t.corners*t.width>>1)+"px"})}var n=0,r;for(;n<t.lines;n++)r=c(o(),{position:"absolute",top:1+~(t.width/2)+"px",transform:t.hwaccel?"translate3d(0,0,0)":"",opacity:t.opacity,animation:s&&f(t.opacity,t.trail,n,t.lines)+" "+1/t.speed+"s linear infinite"}),t.shadow&&u(r,c(i("#000","0 0 4px #000"),{top:"2px"})),u(e,u(r,i(t.color,"0 0 1px rgba(0,0,0,.1)")));return e},opacity:function(e,t,n){t<e.childNodes.length&&(e.childNodes[t].style.opacity=n)}}),function(){function e(e,t){return o("<"+e+' xmlns="urn:schemas-microsoft.com:vml" class="spin-vml">',t)}var t=c(o("group"),{behavior:"url(#default#VML)"});!l(t,"transform")&&t.adj?(a.addRule(".spin-vml","behavior:url(#default#VML)"),v.prototype.lines=function(t,n){function s(){return c(e("group",{coordsize:i+" "+i,coordorigin:-r+" "+ -r}),{width:i,height:i})}function l(t,i,o){u(a,u(c(s(),{rotation:360/n.lines*t+"deg",left:~~i}),u(c(e("roundrect",{arcsize:n.corners}),{width:r,height:n.width,left:n.radius,top:-n.width>>1,filter:o}),e("fill",{color:n.color,opacity:n.opacity}),e("stroke",{opacity:0}))))}var r=n.length+n.width,i=2*r,o=-(n.width+n.length)*2+"px",a=c(s(),{position:"absolute",top:o,left:o}),f;if(n.shadow)for(f=1;f<=n.lines;f++)l(f,-2,"progid:DXImageTransform.Microsoft.Blur(pixelradius=2,makeshadow=1,shadowopacity=.3)");for(f=1;f<=n.lines;f++)l(f);return u(t,a)},v.prototype.opacity=function(e,t,n,r){var i=e.firstChild;r=r.shadow&&r.lines||0,i&&t+r<i.childNodes.length&&(i=i.childNodes[t+r],i=i&&i.firstChild,i=i&&i.firstChild,i&&(i.opacity=n))}):s=l(t,"animation")}(),typeof define=="function"&&define.amd?define(function(){return v}):e.Spinner=v}(window,document);
/*

You can now create a spinner using any of the variants below:

$("#el").spin(); // Produces default Spinner using the text color of #el.
$("#el").spin("small"); // Produces a 'small' Spinner using the text color of #el.
$("#el").spin("large", "white"); // Produces a 'large' Spinner in white (or any valid CSS color).
$("#el").spin({ ... }); // Produces a Spinner using your custom settings.

$("#el").spin(false); // Kills the spinner.

*/
(function($) {
	$.fn.spin = function(opts, color) {
		var presets = {
			"tiny": { lines: 8, length: 2, width: 2, radius: 3 },
			"small": { lines: 8, length: 4, width: 3, radius: 5 },
			"large": { lines: 10, length: 8, width: 4, radius: 8 }
		};
		if (Spinner) {
			return this.each(function() {
				var $this = $(this),
					data = $this.data();
				
				if (data.spinner) {
					data.spinner.stop();
					delete data.spinner;
				}
				if (opts !== false) {
					if (typeof opts === "string") {
						if (opts in presets) {
							opts = presets[opts];
						} else {
							opts = {};
						}
						if (color) {
							opts.color = color;
						}
					}
					data.spinner = new Spinner($.extend({color: $this.css('color')}, opts)).spin(this);
				}
			});
		} else {
			throw "Spinner class not available.";
		}
	};
})(jQuery);
function Swipe(m,e){var f=function(){};var u=function(C){setTimeout(C||f,0)};var B={addEventListener:!!window.addEventListener,touch:("ontouchstart" in window)||window.DocumentTouch&&document instanceof DocumentTouch,transitions:(function(C){var E=["transitionProperty","WebkitTransition","MozTransition","OTransition","msTransition"];for(var D in E){if(C.style[E[D]]!==undefined){return true}}return false})(document.createElement("swipe"))};if(!m){return}var c=m.children[0];var s,d,r,g;e=e||{};var k=parseInt(e.startSlide,10)||0;var v=e.speed||300;e.continuous=e.continuous!==undefined?e.continuous:true;function n(){s=c.children;g=s.length;if(s.length<2){e.continuous=false}if(B.transitions&&e.continuous&&s.length<3){c.appendChild(s[0].cloneNode(true));c.appendChild(c.children[1].cloneNode(true));s=c.children}d=new Array(s.length);r=m.getBoundingClientRect().width||m.offsetWidth;c.style.width=(s.length*r)+"px";var D=s.length;while(D--){var C=s[D];C.style.width=r+"px";C.setAttribute("data-index",D);if(B.transitions){C.style.left=(D*-r)+"px";q(D,k>D?-r:(k<D?r:0),0)}}if(e.continuous&&B.transitions){q(i(k-1),-r,0);q(i(k+1),r,0)}if(!B.transitions){c.style.left=(k*-r)+"px"}m.style.visibility="visible"}function o(){if(e.continuous){a(k-1)}else{if(k){a(k-1)}}}function p(){if(e.continuous){a(k+1)}else{if(k<s.length-1){a(k+1)}}}function i(C){return(s.length+(C%s.length))%s.length}function a(G,D){if(k==G){return}if(B.transitions){var F=Math.abs(k-G)/(k-G);if(e.continuous){var C=F;F=-d[i(G)]/r;if(F!==C){G=-F*s.length+G}}var E=Math.abs(k-G)-1;while(E--){q(i((G>k?G:k)-E-1),r*F,0)}G=i(G);q(k,r*F,D||v);q(G,0,D||v);if(e.continuous){q(i(G-F),-(r*F),0)}}else{G=i(G);j(k*-r,G*-r,D||v)}k=G;u(e.callback&&e.callback(k,s[k]))}function q(C,E,D){l(C,E,D);d[C]=E}function l(D,G,F){var C=s[D];var E=C&&C.style;if(!E){return}E.webkitTransitionDuration=E.MozTransitionDuration=E.msTransitionDuration=E.OTransitionDuration=E.transitionDuration=F+"ms";E.webkitTransform="translate("+G+"px,0)translateZ(0)";E.msTransform=E.MozTransform=E.OTransform="translateX("+G+"px)"}function j(G,F,C){if(!C){c.style.left=F+"px";return}var E=+new Date;var D=setInterval(function(){var H=+new Date-E;if(H>C){c.style.left=F+"px";if(A){x()}e.transitionEnd&&e.transitionEnd.call(event,k,s[k]);clearInterval(D);return}c.style.left=(((F-G)*(Math.floor((H/C)*100)/100))+G)+"px"},4)}var A=e.auto||0;var w;function x(){w=setTimeout(p,A)}function t(){A=0;clearTimeout(w)}var h={};var y={};var z;var b={handleEvent:function(C){switch(C.type){case"touchstart":this.start(C);break;case"touchmove":this.move(C);break;case"touchend":u(this.end(C));break;case"webkitTransitionEnd":case"msTransitionEnd":case"oTransitionEnd":case"otransitionend":case"transitionend":u(this.transitionEnd(C));break;case"resize":u(n.call());break}if(e.stopPropagation){C.stopPropagation()}},start:function(C){var D=C.touches[0];h={x:D.pageX,y:D.pageY,time:+new Date};z=undefined;y={};c.addEventListener("touchmove",this,false);c.addEventListener("touchend",this,false)},move:function(C){if(C.touches.length>1||C.scale&&C.scale!==1){return}if(e.disableScroll){C.preventDefault()}var D=C.touches[0];y={x:D.pageX-h.x,y:D.pageY-h.y};if(typeof z=="undefined"){z=!!(z||Math.abs(y.x)<Math.abs(y.y))}if(!z){C.preventDefault();t();if(e.continuous){l(i(k-1),y.x+d[i(k-1)],0);l(k,y.x+d[k],0);l(i(k+1),y.x+d[i(k+1)],0)}else{y.x=y.x/((!k&&y.x>0||k==s.length-1&&y.x<0)?(Math.abs(y.x)/r+1):1);l(k-1,y.x+d[k-1],0);l(k,y.x+d[k],0);l(k+1,y.x+d[k+1],0)}}},end:function(E){var G=+new Date-h.time;var D=Number(G)<250&&Math.abs(y.x)>20||Math.abs(y.x)>r/2;var C=!k&&y.x>0||k==s.length-1&&y.x<0;if(e.continuous){C=false}var F=y.x<0;if(!z){if(D&&!C){if(F){if(e.continuous){q(i(k-1),-r,0);q(i(k+2),r,0)}else{q(k-1,-r,0)}q(k,d[k]-r,v);q(i(k+1),d[i(k+1)]-r,v);k=i(k+1)}else{if(e.continuous){q(i(k+1),r,0);q(i(k-2),-r,0)}else{q(k+1,r,0)}q(k,d[k]+r,v);q(i(k-1),d[i(k-1)]+r,v);k=i(k-1)}e.callback&&e.callback(k,s[k])}else{if(e.continuous){q(i(k-1),-r,v);q(k,0,v);q(i(k+1),r,v)}else{q(k-1,-r,v);q(k,0,v);q(k+1,r,v)}}}c.removeEventListener("touchmove",b,false);c.removeEventListener("touchend",b,false)},transitionEnd:function(C){if(parseInt(C.target.getAttribute("data-index"),10)==k){if(A){x()}e.transitionEnd&&e.transitionEnd.call(C,k,s[k])}}};n();if(A){x()}if(B.addEventListener){if(B.touch){c.addEventListener("touchstart",b,false)}if(B.transitions){c.addEventListener("webkitTransitionEnd",b,false);c.addEventListener("msTransitionEnd",b,false);c.addEventListener("oTransitionEnd",b,false);c.addEventListener("otransitionend",b,false);c.addEventListener("transitionend",b,false)}window.addEventListener("resize",b,false)}else{window.onresize=function(){n()}}return{setup:function(){n()},slide:function(D,C){t();a(D,C)},prev:function(){t();o()},next:function(){t();p()},getPos:function(){return k},getNumSlides:function(){return g},kill:function(){t();c.style.width="auto";c.style.left=0;var D=s.length;while(D--){var C=s[D];C.style.width="100%";C.style.left=0;if(B.transitions){l(D,0,0)}}if(B.addEventListener){c.removeEventListener("touchstart",b,false);c.removeEventListener("webkitTransitionEnd",b,false);c.removeEventListener("msTransitionEnd",b,false);c.removeEventListener("oTransitionEnd",b,false);c.removeEventListener("otransitionend",b,false);c.removeEventListener("transitionend",b,false);window.removeEventListener("resize",b,false)}else{window.onresize=null}}}}if(window.jQuery||window.Zepto){(function(a){a.fn.Swipe=function(b){return this.each(function(){a(this).data("Swipe",new Swipe(a(this)[0],b))})}})(window.jQuery||window.Zepto)};
/* WPtouch Pro Foundation Base JS */
/* Description: This file holds all the default jQuery & Ajax functions for the Foundation parent theme on mobile & tablets, used by all child themes */

// Try to get out of frames!
function wptouchFdnEscFrames() {
	if ( window.top != window.self ) { 
		window.top.location = self.location.href
	}	
}

function wptouchFdnIfFixed() {
	if ( wptouchFdnHasFixedPos() ) {
		jQuery( 'body' ).addClass( 'has-fixed' );		
	}
}

function wptouchFdnBindBackButtons( buttonElement ) {
	if ( typeof( buttonElement ) === 'undefined' ) buttonElement = '.back-button';
	jQuery( buttonElement ).on( 'click', function( e ) {
		history.back();
		e.preventDefault();
	});
}

function wptouchFdnBindFwdButtons( buttonElement ) {
	if ( typeof( buttonElement ) === 'undefined' ) buttonElement = '.fwd-button';
	jQuery( buttonElement ).on( 'click', function( e ) {
		history.forward();
		e.preventDefault();
	});
}

// Try to make smaller elements nicer in posts
function wptouchFdnCenterImages( elements, imgWidth ) {
	jQuery( elements ).each( function() {
		if ( !jQuery( this ).hasClass( 'aligncenter' ) && jQuery( this ).width() > imgWidth ) {
			jQuery( this ).addClass( 'aligncenter' );
		}
	});
}

/* Detect screen sizes and other device details and add or remove corresponding 'smartphone' or 'tablet' classes
	Using document.body.clientWidth because it's faster (and it's what jQuery uses under the hood, anyways) */
function wptouchFdnUpdateDevice() {
	var bodyEl = jQuery( 'body' );
	// Update the body class if the device width is equal to or bigger than 768px 
	if ( document.body.clientWidth < 768 && !bodyEl.hasClass( 'smartphone' ) ) {
		bodyEl.addClass( 'smartphone' ).removeClass( 'tablet' );
		// Create a cookie for the device class so we can reference it via PHP afterwards if needed
		wptouchCreateCookie( 'wptouch-device-type', 'smartphone', 365 );
	} else if ( document.body.clientWidth >= 768 && !bodyEl.hasClass( 'tablet' ) ) {
		bodyEl.addClass( 'tablet' ).removeClass( 'smartphone' );
		// Create a cookie for the device class so we can reference it via PHP afterwards if needed
		wptouchCreateCookie( 'wptouch-device-type', 'tablet', 365 );
	}
}

function wptouchFdnUpdateOrientation() {
	var bodyEl = jQuery( 'body' );

	// If it's a smartphone & the clientWidth is less than 480, assume it's portrait, else landscape (works for iPhone 5, as well )
	if ( bodyEl.hasClass( 'smartphone' ) ) { 
		if ( document.body.clientWidth < 480 ) {
			bodyEl.addClass( 'portrait' ).removeClass( 'landscape' );
			wptouchCreateCookie( 'wptouch-device-orientation', 'portrait', 365 );
	} else {
			bodyEl.addClass( 'landscape' ).removeClass( 'portrait' );
			wptouchCreateCookie( 'wptouch-device-orientation', 'landscape', 365 );
		}
	} 

	// If it's a tablet & the clientWidth is less than 1024, assume it's portrait, else landscape
	if ( bodyEl.hasClass( 'tablet' ) ) {
		if ( document.body.clientWidth < 1024 ) {
			bodyEl.addClass( 'portrait' ).removeClass( 'landscape' );
			wptouchCreateCookie( 'wptouch-device-orientation', 'portrait', 365 );
		} else {
			bodyEl.addClass( 'landscape' ).removeClass( 'portrait' );
			wptouchCreateCookie( 'wptouch-device-orientation', 'landscape', 365 );
		}
	}
}

function wptouchFdnDoDeviceAndOrientationListener() {
	jQuery( window ).resize( function() {
		wptouchFdnUpdateDevice();
		wptouchFdnUpdateOrientation();
	}).resize();
}

// Back to top links in themes
function wptouchFdnSetupBackToTopLinks() {
	jQuery( '.back-to-top' ).each( function() {
		jQuery( this ).on( 'click', function( e ){
		    jQuery( 'body' ).animate( { scrollTop: jQuery( 'html' ).offset().top }, 750 );		
			e.preventDefault();
		});
	});
}

function wptouchFdnSetupShowHideToggles() {
	jQuery( '.show-hide-toggle' ).each( function() {
		var targetId = jQuery( this ).attr( 'data-effect-target' );
		var closeId = jQuery( this ).attr( 'data-effect-close' );
		var linkId = jQuery( this ).attr( 'id' );

		jQuery( this ).on( 'click', function( e ) {
			if ( typeof( closeId ) !== 'undefined' ) {
				var originalId = jQuery( '#' + closeId ).attr( 'data-source-click' );
				if ( typeof( originalId ) !== 'undefined' ) {
					jQuery( '#' + originalId ).removeClass( 'toggle-open' );
					jQuery( '#' + closeId ).data( 'data-source-click', '' );
				}
				
				jQuery( '#' + closeId ).hide();
			}

			jQuery( this ).toggleClass( 'toggle-open' );
			jQuery( '#' + targetId ).opacityToggle( 380 ).attr( 'data-source-click', linkId );	
		
			e.preventDefault();
		});
	});
}

function wptouchFdnSetupSlideToggles() {
	jQuery( '.slide-toggle' ).each( function() {	
		var targetId = jQuery( this ).attr( 'data-effect-target' );
		wptouchFdnSlideToggle( this, '#' + targetId, 500 );
	});
}

function wptouchFdnCheckHideAddressBar() {
	if ( jQuery( 'body' ).hasClass( 'hide-address-bar' ) ) {
		window.scrollTo( 0,1 );
	}
}

function wptouchFdnPreviewReload() {
	jQuery( '#preview-bar' ).find( '.refresher' ).on( 'click', function() {
		setTimeout( window.location.reload.bind( window.location ), 0 );
	});
}

function wptouchFdnSwitchToggle() {
	jQuery( '#switch' ).on( 'click', '.off', function() { 
		jQuery( '.on' ).removeClass( 'active' );
		jQuery( this ).addClass( 'active' );
	});
}

function wptouchFdnHandleShortcode() {
	if ( !navigator.standalone ) {
		jQuery( '.wptouch-shortcode-mobile-only' ).show();
	}
}

function wptouchFdnSetupjQuery() {

	// New jQuery function opacityToggle()
	jQuery.fn.opacityToggle = function( speed, easing, callback ) { 
		return this.animate( { opacity: 'toggle' }, speed, easing, callback ); 
   	}
	
	// New jQuery function webkitSlideToggle()
	jQuery.fn.webkitSlideToggle = function() {     
		if ( !this.hasClass( 'slide-in' ) ) {
			this.show().addClass( 'slide-in' );
		} else {
			this.opacityToggle( 330 ).removeClass( 'slide-in' );
		}
  	}

	// New jQuery function viewportCenter()
	jQuery.fn.viewportCenter = function() {
	    this.css( 'position', 'absolute' );
	    this.css( 'top', ( ( jQuery( window ).height() - this.outerHeight() ) / 3 ) + jQuery( window ).scrollTop() + 'px' );
	    this.css( 'left', ( ( jQuery( window ).width() - this.outerWidth() ) / 2 ) + jQuery( window ).scrollLeft() + 'px' );
		this.show();
	    return this;
	}

	// Set the form element tabindex automagically
	jQuery( function() {
		var tabindex = 1;
		jQuery( 'input, select, textarea' ).each( function() {
			if ( this.type != "hidden" ) {
				var inputToTab = jQuery( this );
				inputToTab.attr( 'tabindex', tabindex );
				tabindex++;
			}
		});
	});
}

function wptouchFdnMoveCustomAds(){
	if ( jQuery( 'body' ).hasClass( 'header-ad' ) ) {
		jQuery( '.wptouch-custom-ad' ).detach().prependTo( '#content' ).show();
	}
}

function wptouchFdnBaseReady() {
	wptouchFdnEscFrames();
	wptouchFdnIfFixed();
	wptouchFdnBindBackButtons();
	wptouchFdnBindFwdButtons();
	wptouchFdnCenterImages( '.post img', 105 );
	wptouchFdnDoDeviceAndOrientationListener();
	wptouchFdnSetupBackToTopLinks();
	wptouchFdnSetupShowHideToggles();
	wptouchFdnSetupSlideToggles();
	wptouchFdnCheckHideAddressBar();
	wptouchFdnPreviewReload();
	wptouchFdnSwitchToggle();
	wptouchFdnSetupjQuery();
	wptouchFdnHandleShortcode();
	wptouchFdnMoveCustomAds();
}

jQuery( document ).ready( function() { wptouchFdnBaseReady(); } );
/* WPtouch Pro Public Foundation JavaScript Functions */
/* Description: These functions can be used in themes as needed */

function wptouchFdnIsiOS6() {
	return ( '-webkit-filter' in document.body.style );
}

function wptouchFdnHasFixedPos() {
	if ( jQuery( 'body' ).hasClass( 'preview-mode' ) ) { 
		return true; 
	} else {
		return '-webkit-overflow-scrolling' in document.body.style;	
	}
}

// Function for fade-toggling hidden elements
function wptouchFdnShowHideToggle( linkTrigger, hiddenElement ) {
	jQuery( linkTrigger ).on( 'click', function( e ) {
		jQuery( linkTrigger ).toggleClass( 'toggle-open' );
		jQuery( hiddenElement ).opacityToggle( 380 );	
		
		e.preventDefault();
	});
}

// Function for slide-toggling hidden elements
function wptouchFdnSlideToggle( linkTrigger, hiddenElement, speed ) {
	jQuery( linkTrigger ).on( 'click', function( e ) {
		jQuery( linkTrigger ).toggleClass( 'toggle-open' );
		jQuery( hiddenElement ).slideToggle( speed );	
		
		e.preventDefault();
	});
}

function wptouchFdnSetupjQuery() {

	// New jQuery function opacityToggle()
	jQuery.fn.opacityToggle = function( speed, easing, callback ) { 
		return this.animate( { opacity: 'toggle' }, speed, easing, callback ); 
   	}
	
	// New jQuery function webkitSlideToggle()
	jQuery.fn.webkitSlideToggle = function() {     
		if ( !this.hasClass( 'slide-in' ) ) {
			this.show().addClass( 'slide-in' );
		} else {
			this.opacityToggle( 330 ).removeClass( 'slide-in' );
		}
  	}

	// New jQuery function viewportCenter()
	jQuery.fn.viewportCenter = function() {
	    this.css( 'position', 'absolute' );
	    this.css( 'top', ( ( jQuery( window ).height() - this.outerHeight() ) / 3 ) + jQuery( window ).scrollTop() + 'px' );
	    this.css( 'left', ( ( jQuery( window ).width() - this.outerWidth() ) / 2 ) + jQuery( window ).scrollLeft() + 'px' );
		this.show();
	    return this;
	}

	// Set the form element tabindex automagically
	jQuery( function() {
		var tabindex = 1;
		jQuery( 'input, select, textarea' ).each( function() {
			if ( this.type != "hidden" ) {
				var inputToTab = jQuery( this );
				inputToTab.attr( 'tabindex', tabindex );
				tabindex++;
			}
		});
	});
}

// Create a cookie
function wptouchCreateCookie( name, value, days ) {
	if ( days ) {
		var date = new Date();
		date.setTime( date.getTime() + ( days*24*60*60*1000 ) );
		var expires = '; expires='+date.toGMTString();
	}
	else var expires = '';
	document.cookie = name+'='+value+expires+'; path='+wptouchMain.siteurl;
}

// Read a cookie
function wptouchReadCookie( name ) {
	var nameEQ = name + "=";
	var ca = document.cookie.split( ';' );
	for( var i=0; i < ca.length; i++ ) {
		var c = ca[i];
		while ( c.charAt( 0 )==' ' ) c = c.substring( 1, c.length );
		if ( c.indexOf( nameEQ ) == 0 ) return c.substring( nameEQ.length, c.length );
	}
	return null;
}

// Erase a cookie
function wptouchEraseCookie( name ) {
	wptouchCreateCookie( name, '', -1 );
}

// List all cookies (useful in alerts for testing)
function wptouchListCookies() {
    var theCookies = document.cookie.split(';');
    var aString = '';
    for (var i = 1 ; i <= theCookies.length; i++) {
        aString += i + ' ' + theCookies[i-1] + "\n";
    }
    return aString;
}
function wptouchDoPreview() {
	jQuery( 'a' ).each( function() {
		var linkLocation = jQuery( this ).attr( 'href' );
		if ( linkLocation ) {
			if ( linkLocation.search( "\\?" ) == -1 ) {
				linkLocation = linkLocation + '?wptouch_preview_theme=enabled';
			} else {
				linkLocation = linkLocation + '&wptouch_preview_theme=enabled';
			}
			jQuery( this ).attr( 'href', linkLocation );
		}
	});
}

jQuery( document ).ready( function() { wptouchDoPreview(); });
/* WPtouch Foundation FastClick Code */
jQuery(function() {
    FastClick.attach(document.body);
});
function FastClick(layer){var oldOnClick,self=this;this.trackingClick=false;this.trackingClickStart=0;this.targetElement=null;this.touchStartX=0;this.touchStartY=0;this.lastTouchIdentifier=0;this.touchBoundary=10;this.layer=layer;if(!layer||!layer.nodeType){throw new TypeError("Layer must be a document node")}this.onClick=function(){return FastClick.prototype.onClick.apply(self,arguments)};this.onMouse=function(){return FastClick.prototype.onMouse.apply(self,arguments)};this.onTouchStart=function(){return FastClick.prototype.onTouchStart.apply(self,arguments)};this.onTouchEnd=function(){return FastClick.prototype.onTouchEnd.apply(self,arguments)};this.onTouchCancel=function(){return FastClick.prototype.onTouchCancel.apply(self,arguments)};if(FastClick.notNeeded(layer)){return}if(this.deviceIsAndroid){layer.addEventListener("mouseover",this.onMouse,true);layer.addEventListener("mousedown",this.onMouse,true);layer.addEventListener("mouseup",this.onMouse,true)}layer.addEventListener("click",this.onClick,true);layer.addEventListener("touchstart",this.onTouchStart,false);layer.addEventListener("touchend",this.onTouchEnd,false);layer.addEventListener("touchcancel",this.onTouchCancel,false);if(!Event.prototype.stopImmediatePropagation){layer.removeEventListener=function(type,callback,capture){var rmv=Node.prototype.removeEventListener;if(type==="click"){rmv.call(layer,type,callback.hijacked||callback,capture)}else{rmv.call(layer,type,callback,capture)}};layer.addEventListener=function(type,callback,capture){var adv=Node.prototype.addEventListener;if(type==="click"){adv.call(layer,type,callback.hijacked||(callback.hijacked=function(event){if(!event.propagationStopped){callback(event)}}),capture)}else{adv.call(layer,type,callback,capture)}}}if(typeof layer.onclick==="function"){oldOnClick=layer.onclick;layer.addEventListener("click",function(event){oldOnClick(event)},false);layer.onclick=null}}FastClick.prototype.deviceIsAndroid=navigator.userAgent.indexOf("Android")>0;FastClick.prototype.deviceIsIOS=/iP(ad|hone|od)/.test(navigator.userAgent);FastClick.prototype.deviceIsIOS4=FastClick.prototype.deviceIsIOS&&(/OS 4_\d(_\d)?/).test(navigator.userAgent);FastClick.prototype.deviceIsIOSWithBadTarget=FastClick.prototype.deviceIsIOS&&(/OS ([6-9]|\d{2})_\d/).test(navigator.userAgent);FastClick.prototype.needsClick=function(target){switch(target.nodeName.toLowerCase()){case"button":case"select":case"textarea":if(target.disabled){return true}break;case"input":if((this.deviceIsIOS&&target.type==="file")||target.disabled){return true}break;case"label":case"video":return true}return(/\bneedsclick\b/).test(target.className)};FastClick.prototype.needsFocus=function(target){switch(target.nodeName.toLowerCase()){case"textarea":case"select":return true;case"input":switch(target.type){case"button":case"checkbox":case"file":case"image":case"radio":case"submit":return false}return !target.disabled&&!target.readOnly;default:return(/\bneedsfocus\b/).test(target.className)}};FastClick.prototype.sendClick=function(targetElement,event){var clickEvent,touch;if(document.activeElement&&document.activeElement!==targetElement){document.activeElement.blur()}touch=event.changedTouches[0];clickEvent=document.createEvent("MouseEvents");clickEvent.initMouseEvent("click",true,true,window,1,touch.screenX,touch.screenY,touch.clientX,touch.clientY,false,false,false,false,0,null);clickEvent.forwardedTouchEvent=true;targetElement.dispatchEvent(clickEvent)};FastClick.prototype.focus=function(targetElement){var length;if(this.deviceIsIOS&&targetElement.setSelectionRange){length=targetElement.value.length;targetElement.setSelectionRange(length,length)}else{targetElement.focus()}};FastClick.prototype.updateScrollParent=function(targetElement){var scrollParent,parentElement;scrollParent=targetElement.fastClickScrollParent;if(!scrollParent||!scrollParent.contains(targetElement)){parentElement=targetElement;do{if(parentElement.scrollHeight>parentElement.offsetHeight){scrollParent=parentElement;targetElement.fastClickScrollParent=parentElement;break}parentElement=parentElement.parentElement}while(parentElement)}if(scrollParent){scrollParent.fastClickLastScrollTop=scrollParent.scrollTop}};FastClick.prototype.getTargetElementFromEventTarget=function(eventTarget){if(eventTarget.nodeType===Node.TEXT_NODE){return eventTarget.parentNode}return eventTarget};FastClick.prototype.onTouchStart=function(event){var targetElement,touch,selection;if(event.targetTouches.length>1){return true}targetElement=this.getTargetElementFromEventTarget(event.target);touch=event.targetTouches[0];if(this.deviceIsIOS){selection=window.getSelection();if(selection.rangeCount&&!selection.isCollapsed){return true}if(!this.deviceIsIOS4){if(touch.identifier===this.lastTouchIdentifier){event.preventDefault();return false}this.lastTouchIdentifier=touch.identifier;this.updateScrollParent(targetElement)}}this.trackingClick=true;this.trackingClickStart=event.timeStamp;this.targetElement=targetElement;this.touchStartX=touch.pageX;this.touchStartY=touch.pageY;if((event.timeStamp-this.lastClickTime)<200){event.preventDefault()}return true};FastClick.prototype.touchHasMoved=function(event){var touch=event.changedTouches[0],boundary=this.touchBoundary;if(Math.abs(touch.pageX-this.touchStartX)>boundary||Math.abs(touch.pageY-this.touchStartY)>boundary){return true}return false};FastClick.prototype.findControl=function(labelElement){if(labelElement.control!==undefined){return labelElement.control}if(labelElement.htmlFor){return document.getElementById(labelElement.htmlFor)}return labelElement.querySelector("button, input:not([type=hidden]), keygen, meter, output, progress, select, textarea")};FastClick.prototype.onTouchEnd=function(event){var forElement,trackingClickStart,targetTagName,scrollParent,touch,targetElement=this.targetElement;if(this.touchHasMoved(event)){this.trackingClick=false;this.targetElement=null}if(!this.trackingClick){return true}if((event.timeStamp-this.lastClickTime)<200){this.cancelNextClick=true;return true}this.lastClickTime=event.timeStamp;trackingClickStart=this.trackingClickStart;this.trackingClick=false;this.trackingClickStart=0;if(this.deviceIsIOSWithBadTarget){touch=event.changedTouches[0];targetElement=document.elementFromPoint(touch.pageX-window.pageXOffset,touch.pageY-window.pageYOffset)}targetTagName=targetElement.tagName.toLowerCase();if(targetTagName==="label"){forElement=this.findControl(targetElement);if(forElement){this.focus(targetElement);if(this.deviceIsAndroid){return false}targetElement=forElement}}else{if(this.needsFocus(targetElement)){if((event.timeStamp-trackingClickStart)>100||(this.deviceIsIOS&&window.top!==window&&targetTagName==="input")){this.targetElement=null;return false}this.focus(targetElement);if(!this.deviceIsIOS4||targetTagName!=="select"){this.targetElement=null;event.preventDefault()}return false}}if(this.deviceIsIOS&&!this.deviceIsIOS4){scrollParent=targetElement.fastClickScrollParent;if(scrollParent&&scrollParent.fastClickLastScrollTop!==scrollParent.scrollTop){return true}}if(!this.needsClick(targetElement)){event.preventDefault();this.sendClick(targetElement,event)}return false};FastClick.prototype.onTouchCancel=function(){this.trackingClick=false;this.targetElement=null};FastClick.prototype.onMouse=function(event){if(!this.targetElement){return true}if(event.forwardedTouchEvent){return true}if(!event.cancelable){return true}if(!this.needsClick(this.targetElement)||this.cancelNextClick){if(event.stopImmediatePropagation){event.stopImmediatePropagation()}else{event.propagationStopped=true}event.stopPropagation();event.preventDefault();return false}return true};FastClick.prototype.onClick=function(event){var permitted;if(this.trackingClick){this.targetElement=null;this.trackingClick=false;return true}if(event.target.type==="submit"&&event.detail===0){return true}permitted=this.onMouse(event);if(!permitted){this.targetElement=null}return permitted};FastClick.prototype.destroy=function(){var layer=this.layer;if(this.deviceIsAndroid){layer.removeEventListener("mouseover",this.onMouse,true);layer.removeEventListener("mousedown",this.onMouse,true);layer.removeEventListener("mouseup",this.onMouse,true)}layer.removeEventListener("click",this.onClick,true);layer.removeEventListener("touchstart",this.onTouchStart,false);layer.removeEventListener("touchend",this.onTouchEnd,false);layer.removeEventListener("touchcancel",this.onTouchCancel,false)};FastClick.notNeeded=function(layer){var metaViewport;if(typeof window.ontouchstart==="undefined"){return true}if((/Chrome\/[0-9]+/).test(navigator.userAgent)){if(FastClick.prototype.deviceIsAndroid){metaViewport=document.querySelector("meta[name=viewport]");if(metaViewport&&metaViewport.content.indexOf("user-scalable=no")!==-1){return true}}else{return true}}if(layer.style.msTouchAction==="none"){return true}return false};FastClick.attach=function(layer){return new FastClick(layer)};if(typeof define!=="undefined"&&define.amd){define(function(){return FastClick})}else{if(typeof module!=="undefined"&&module.exports){module.exports=FastClick.attach;module.exports.FastClick=FastClick}else{window.FastClick=FastClick}};

function doFoundationFeaturedReady() {

	foundationCreateDots();

	var slideNumber = 0;
	var isContinuous = false;

	var slideOption = '0';
	if ( jQuery( '#slider' ).hasClass( 'slide' ) ) {
		slideOption = '4000';
		if ( jQuery( '#slider' ).hasClass( 'slow') ) {
			slideOption = '6000';
		} else if ( jQuery( '#slider').hasClass( 'fast') ) {
			slideOption = '2500';
		}		
	} 
	

	if ( jQuery( '#slider' ).hasClass( 'continuous' ) ) {
		isContinuous = true;
	}
		
	var sliderOptions = {
		startSlide: slideNumber,
		continuous: isContinuous,
		callback: function( pos ) {
			var i = bullets.length;
			while (i--) {
				bullets[i].className = ' ';
			}
			bullets[pos].className = 'active';
		}		
	}

	// only include this parameter if it's non-zero
	if ( slideOption > 0  && !jQuery( 'body' ).hasClass( 'rtl' ) ) {
		sliderOptions.auto = slideOption;
	}

	var featuredSlider = new Swipe( document.getElementById( 'slider' ), sliderOptions );

	var bullets = jQuery( '.dots' ).find( 'li' );
}

function foundationCreateDots() {
	
	var sliderEl = jQuery( '#slider' );
	var images = sliderEl.find( 'img' );
	var slideNumber = 0;

	// Create dots
	var dots = '<ul class="dots">';

	for ( i = 0; i < images.length; i++ ) {
		dots = dots + '<li data-pos="'+i+'">&nbsp;</li>';
	}

	dots = dots + '</ul>';

	sliderEl.before( dots );

	if ( jQuery( 'body' ).hasClass( 'rtl' ) ) {
		var slideCount = jQuery( '.dots li' ).length;
		slideNumber = slideCount - 1;
	}			

	jQuery( '.dots' ).find( 'li[data-pos="'+slideNumber+'"]' ).addClass( 'active' );
}

jQuery( document ).ready( function() { doFoundationFeaturedReady(); } );

function doFoundationLoadMoreReady() {
	var loadMoreLink = 'a.load-more-link';
	jQuery( '#content' ).on( 'click', loadMoreLink, function( e ) {
		jQuery( loadMoreLink ).addClass( 'ajaxing' ).text( wptouchFdn.ajaxLoading ).prepend( '<span class="spinner"></span>' );
		jQuery( '.spinner' ).spin( 'tiny' );
		var loadMoreURL = jQuery( loadMoreLink ).attr( 'rel' );

		jQuery( loadMoreLink ).after( "<span class='ajax-target'></span>" );
		jQuery( '.ajax-target' ).load( loadMoreURL + ' #content > div, #content .load-more-link', function() {
			jQuery( '.ajax-target' ).replaceWith( jQuery( this ).html() );	
			jQuery( '.ajaxing' ).animate( { height: 'toggle' }, 200, 'linear', function(){ jQuery( this ).remove(); } );
		});
		
		e.preventDefault();
	});	

	// Load More Comments
	var loadMoreComsLink = '.load-more-comments-wrap a';
	jQuery( '.commentlist' ).on( 'click', loadMoreComsLink, function() {
		jQuery( loadMoreComsLink ).addClass( 'ajaxing' ).text( wptouchFdn.ajaxLoading ).prepend( '<span class="spinner"></span>' );
		jQuery( '.spinner' ).spin( 'tiny' );
		var loadMoreURL = jQuery( loadMoreComsLink ).prop( 'href' );

		jQuery( loadMoreComsLink ).parent().after( "<span class='ajax-target'></span>" );
		jQuery( '.ajax-target' ).load( loadMoreURL + ' ol.commentlist > li', function() {
			jQuery( '.ajax-target' ).replaceWith( jQuery( this ).html() );	
			jQuery( '.ajaxing' ).animate( { height: 'toggle' }, 200, 'linear', function(){ jQuery( this ).parent().remove(); } );
		});
		
		return false;
	});

	// Load More Post Search Results
	var loadMorePostSearchLink = 'a.load-more-post-link';
	jQuery( '#content' ).on( 'click', loadMorePostSearchLink, function( e ) {
		jQuery( loadMorePostSearchLink ).addClass( 'ajaxing' ).text( wptouchFdn.ajaxLoading ).prepend( '<span class="spinner"></span>' );
		jQuery( '.spinner' ).spin( 'tiny' );
		var loadMoreURL = jQuery( loadMorePostSearchLink ).attr( 'rel' );

		jQuery( loadMorePostSearchLink ).after( "<span class='ajax-target'></span>" );
		jQuery( '.ajax-target' ).load( loadMoreURL + ' #content #post-results, #content .load-more-post-link', function() {
			jQuery( '.ajax-target' ).replaceWith( jQuery( this ).html() );	
			jQuery( '.ajaxing' ).animate( { height: 'toggle' }, 200, 'linear', function(){ jQuery( this ).remove(); } );
		});
		
		e.preventDefault();
	});	

	// Load More Page Search Results
	var loadMorePageSearchLink = 'a.load-more-page-link';
	jQuery( '#content' ).on( 'click', loadMorePageSearchLink, function( e ) {
		jQuery( loadMorePageSearchLink ).addClass( 'ajaxing' ).text( wptouchFdn.ajaxLoading ).prepend( '<span class="spinner"></span>' );
		jQuery( '.spinner' ).spin( 'tiny' );
		var loadMoreURL = jQuery( loadMorePageSearchLink ).attr( 'rel' );

		jQuery( loadMorePageSearchLink ).after( "<span class='ajax-target'></span>" );
		jQuery( '.ajax-target' ).load( loadMoreURL + ' #content #page-results, #content .load-more-page-link', function() {
			jQuery( '.ajax-target' ).replaceWith( jQuery( this ).html() );	
			jQuery( '.ajaxing' ).animate( { height: 'toggle' }, 200, 'linear', function(){ jQuery( this ).remove(); } );
		});
		
		e.preventDefault();
	});	

}
jQuery( document ).ready( function() { doFoundationLoadMoreReady(); });
/*global jQuery */
/*! 
* FitVids 1.0.1 (modded by http://ialreadydontlikeyou.tumblr.com/post/19574163656/a-modification-to-fitvids-js)
*
* Copyright 2011, Chris Coyier - http://css-tricks.com + Dave Rupert - http://daverupert.com
* Credit to Thierry Koblentz - http://www.alistapart.com/articles/creating-intrinsic-ratios-for-video/
* Released under the WTFPL license - http://sam.zoy.org/wtfpl/
*
* Date: Thu Sept 01 18:00:00 2011 -0500
*/

(function( $ ){

  $.fn.fitVids = function( options ) {
    var settings = {
      customSelector: null
    }
    
	var div = document.createElement('style'),
	ref = document.getElementsByTagName('base')[0] || document.getElementsByTagName('script')[0];
        
    div.innerHTML =
		'.fluid-width-video-wrapper {				\
			width: 100%;										\
			position: relative;								\
			padding: 0;										\
		}                           			       				\
																	\
		.fluid-width-video-wrapper iframe,		\
		.fluid-width-video-wrapper object, 		\
		.fluid-width-video-wrapper embed {	\
			position: absolute;							\
			top: 0;                          					\
			left: 0;                        						\
			width: 100%;                    					\
			height: 100%;									\
		}';
                      
    ref.parentNode.insertBefore(div,ref);
    
    if ( options ) { 
      $.extend( settings, options );
    }
    
    return this.each(function(){
      var selectors = [
        // Vimeo
        "iframe[src^='http://player.vimeo.com']", 
        "iframe[src^='https://player.vimeo.com']", 
        "iframe[src^='//player.vimeo.com']", 
        // YouTube
        "iframe[src^='http://www.youtube.com']", 
        "iframe[src^='https://www.youtube.com']", 
        "iframe[src^='//www.youtube.com']", 
        // Others
        "iframe[src^='http://www.kickstarter.com']",
		"iframe[src^='http://www.funnyordie.com']",
		"iframe[src^='http://media.mtvnservices.com']",
		"iframe[src^='http://trailers.apple.com']",
		"iframe[src^='http://www.brightcove.com']",
		"iframe[src^='http://blip.tv']",
		"iframe[src^='http://break.com']",
		"iframe[src^='http://www.traileraddict.com']",
		"iframe[src^='http://d.yimg.com']",
		"iframe[src^='http://movies.yahoo.com']",
		"iframe[src^='http://www.dailymotion.com']",
		"iframe[src^='http://s.mcstatic.com']",
        "object", 
        "embed"

      ];
      
      if (settings.customSelector) {
        selectors.push(settings.customSelector);
      }
      
      var $allVideos = $(this).find(selectors.join(','));

      $allVideos.each(function(){
        var $this = $(this);
        if (this.tagName.toLowerCase() == 'embed' && $this.parent('object').length || $this.parent('.fluid-width-video-wrapper').length) { return; } 
        var height = this.tagName.toLowerCase() == 'object' ? $this.attr('height') : $this.height(),
            aspectRatio = height / $this.width();
		if(!$this.attr('id')){
			var videoID = 'fitvid' + Math.floor(Math.random()*999999);
			$this.attr('id', videoID);
		}
        $this.wrap('<div class="fluid-width-video-wrapper"></div>').parent('.fluid-width-video-wrapper').css('padding-top', (aspectRatio * 100)+"%");
        $this.removeAttr('height').removeAttr('width');
      });
    });
  
  }
})( jQuery );
/* WPtouch Foundation Media Handling Code */

function handleVids() {
	// Add dynamic automatic video resizing via fitVids (if enabled)
	if ( jQuery.isFunction( jQuery.fn.fitVids ) ) {	
		jQuery( '#content' ).fitVids();
	}
	
	// Add dynamic automatic video resizing via CoyierVids (if enabled)
	if ( typeof window.coyierVids == 'function' ) {
		coyierVids();
	}
	
	// If we have html5 videos, add controls for them if they're not specified, CSS will style them appropriately
	if ( jQuery( 'video' ).length ) {
		jQuery( 'video' ).attr( 'controls', 'controls' );
	}
}

jQuery( document ).ready( function() { handleVids(); } );
/* WPtouch CMS Theme Js File */

function doCMSReady() {
	
	// Triggers focus on the search field when the search tab item is clicked
	jQuery( '#search-menu-button' ).on( 'click', function(){
		jQuery( '#search-text' ).focus();
	});
	
	// Helps with usability and the fastclick module— it's too fast and triggers taps too quickly!
	jQuery( '#section-slider a' ).each( function(){
		jQuery( this ).addClass( 'needsclick' );
	});

	jQuery( '#content' ).on( 'click', '.entry', function(){
		var postLink = jQuery( this ).find( 'a:first').attr( 'href' );
		window.location = postLink;
	})

}
	
jQuery( document ).ready( function() { doCMSReady(); } );
