/*!  - v - 2015-02-24 */"use strict";!function(){if("function"!=typeof window.getMatchedCSSRules){var ELEMENT_RE=/[\w-]+/g,ID_RE=/#[\w-]+/g,CLASS_RE=/\.[\w-]+/g,ATTR_RE=/\[[^\]]+\]/g,PSEUDO_CLASSES_RE=/\:(?!not)[\w-]+(\(.*\))?/g,PSEUDO_ELEMENTS_RE=/\:\:?(after|before|first-letter|first-line|selection)/g,toArray=function(list){for(var items=[],i=0,listLength=list.length;listLength>i;i++)items.push(list[i]);return items},getCSSHost=function(href){var fakeLinkOfSheet=document.createElement("a");return fakeLinkOfSheet.href=href,fakeLinkOfSheet.host},getSheetRules=function(stylesheet){var sheetHost,sheetMedia=stylesheet.media&&stylesheet.media.mediaText;if("true"==objectFit.disableCrossDomain&&(sheetHost=getCSSHost(stylesheet.href),sheetHost!==window.location.host))return[];if(stylesheet.disabled)return[];if(window.matchMedia){if(sheetMedia&&sheetMedia.length&&!window.matchMedia(sheetMedia).matches)return[]}else if(sheetMedia&&sheetMedia.length)return[];return toArray(stylesheet.cssRules)},_find=function(string,re){string.match(re);return re?re.length:0},calculateScore=function(selector){for(var part,match,score=[0,0,0],parts=selector.split(" ");part=parts.shift(),"string"==typeof part;)match=_find(part,PSEUDO_ELEMENTS_RE),score[2]=match,match&&(part=part.replace(PSEUDO_ELEMENTS_RE,"")),match=_find(part,PSEUDO_CLASSES_RE),score[1]=match,match&&(part=part.replace(PSEUDO_CLASSES_RE,"")),match=_find(part,ATTR_RE),score[1]+=match,match&&(part=part.replace(ATTR_RE,"")),match=_find(part,ID_RE),score[0]=match,match&&(part=part.replace(ID_RE,"")),match=_find(part,CLASS_RE),score[1]+=match,match&&(part=part.replace(CLASS_RE,"")),score[2]+=_find(part,ELEMENT_RE);return parseInt(score.join(""),10)},getSpecificityScore=function(element,selectorText){for(var selector,score,selectors=selectorText.split(","),result=0;selector=selectors.shift();)_matchesSelector(element,selector)&&(score=calculateScore(selector),result=score>result?score:result);return result},sortBySpecificity=function(element,rules){var compareSpecificity=function(a,b){return getSpecificityScore(element,b.selectorText)-getSpecificityScore(element,a.selectorText)};return rules.sort(compareSpecificity)},customMatchesSelector=function(element,selector){for(var matches=(element.document||element.ownerDocument).querySelectorAll(selector),i=0;matches[i]&&matches[i]!==element;)i++;return matches[i]?!0:!1},_matchesSelector=function(element,selector){var matcher=function(selector){return element.matches?element.matches(selector):element.matchesSelector?element.matchesSelector(selector):element.mozMatchesSelector?element.mozMatchesSelector(selector):element.webkitMatchesSelector?element.webkitMatchesSelector(selector):element.msMatchesSelector?element.msMatchesSelector(selector):customMatchesSelector(element,selector)};return matcher(selector)};window.getMatchedCSSRules=function(element){var styleSheets,sheet,rules,rule,result=[];for(styleSheets=toArray(window.document.styleSheets);sheet=styleSheets.shift();)for(rules=getSheetRules(sheet);rule=rules.shift();)rule.styleSheet?rules=getSheetRules(rule.styleSheet).concat(rules):rule.media?rules=getSheetRules(rule).concat(rules):_matchesSelector(element,rule.selectorText)&&result.push(rule);return sortBySpecificity(element,result)}}}(),function(){var lastTime=0;window.requestAnimationFrame||(window.requestAnimationFrame=window.webkitRequestAnimationFrame,window.cancelAnimationFrame=window.webkitCancelAnimationFrame||window.webkitCancelRequestAnimationFrame,window.requestAnimationFrame=function(callback){var currTime=(new Date).getTime(),timeToCall=Math.max(0,16-(currTime-lastTime)),id=window.setTimeout(function(){callback(currTime+timeToCall)},timeToCall);return lastTime=currTime+timeToCall,id}),window.cancelAnimationFrame||(window.cancelAnimationFrame=function(id){clearTimeout(id)})}(),function(global){var objectFit={};objectFit._debug=!1,objectFit.observer=null,objectFit.disableCrossDomain="false",objectFit.getComputedStyle=function(element,context){return context=context||window,context.getComputedStyle?context.getComputedStyle(element,null):element.currentStyle},objectFit.getDefaultComputedStyle=function(element){var newelement=element.cloneNode(!0),styles={},iframe=document.createElement("iframe");document.body.appendChild(iframe),iframe.contentWindow.document.open(),iframe.contentWindow.document.write("<body></body>"),iframe.contentWindow.document.body.appendChild(newelement),iframe.contentWindow.document.close();var value,property,defaultElement=iframe.contentWindow.document.querySelectorAll(element.nodeName.toLowerCase())[0],defaultComputedStyle=this.getComputedStyle(defaultElement,iframe.contentWindow);for(property in defaultComputedStyle)if(value=defaultComputedStyle.getPropertyValue===!0?defaultComputedStyle.getPropertyValue(property):defaultComputedStyle[property],null!==value)switch(property){default:styles[property]=value;break;case"width":case"height":case"minWidth":case"minHeight":case"maxWidth":case"maxHeight":}return document.body.removeChild(iframe),styles},objectFit.getMatchedStyle=function(element,property){var val=null,inlineval=null;element.style.getPropertyValue?inlineval=element.style.getPropertyValue(property):element.currentStyle&&(inlineval=element.currentStyle[property]);var r,important,rules=window.getMatchedCSSRules(element),i=rules.length;if(i)for(;i-->0&&(r=rules[i],important=r.style.getPropertyPriority(property),null!==val&&!important||(val=r.style.getPropertyValue(property),!important)););return val||null===inlineval||(val=inlineval),val},objectFit.orientation=function(replacedElement){if(replacedElement.parentNode&&"x-object-fit"===replacedElement.parentNode.nodeName.toLowerCase()){var width=replacedElement.naturalWidth||replacedElement.clientWidth,height=replacedElement.naturalHeight||replacedElement.clientHeight,parentWidth=replacedElement.parentNode.clientWidth,parentHeight=replacedElement.parentNode.clientHeight;!height||width/height>parentWidth/parentHeight?"wider"!==replacedElement.getAttribute("data-x-object-relation")&&(replacedElement.setAttribute("data-x-object-relation","wider"),replacedElement.className="x-object-fit-wider",this._debug&&window.console&&console.log("x-object-fit-wider")):"taller"!==replacedElement.getAttribute("data-x-object-relation")&&(replacedElement.setAttribute("data-x-object-relation","taller"),replacedElement.className="x-object-fit-taller",this._debug&&window.console&&console.log("x-object-fit-taller"))}},objectFit.process=function(args){if(args.selector&&args.replacedElements){switch(objectFit.disableCrossDomain=args.disableCrossDomain||"false",args.fittype=args.fittype||"none",args.fittype){default:return;case"none":case"fill":case"contain":case"cover":}var replacedElements=args.replacedElements;if(replacedElements.length)for(var i=0,replacedElementsLength=replacedElements.length;replacedElementsLength>i;i++)this.processElement(replacedElements[i],args)}},objectFit.processElement=function(replacedElement,args){var property,value,replacedElementStyles=objectFit.getComputedStyle(replacedElement),replacedElementDefaultStyles=objectFit.getDefaultComputedStyle(replacedElement),wrapperElement=document.createElement("x-object-fit");objectFit._debug&&window.console&&console.log("Applying to WRAPPER-------------------------------------------------------");for(property in replacedElementStyles)switch(property){default:value=objectFit.getMatchedStyle(replacedElement,property),null!==value&&""!==value&&(objectFit._debug&&window.console&&console.log(property+": "+value),wrapperElement.style[property]=value);break;case"length":case"parentRule":}objectFit._debug&&window.console&&console.log("Applying to REPLACED ELEMENT-------------------------------------------------------");for(property in replacedElementDefaultStyles)switch(property){default:value=replacedElementDefaultStyles[property],objectFit._debug&&window.console&&""!==value&&(console.log(property+": "+value),void 0===replacedElement.style[property]&&console.log("Indexed style properties (`"+property+"`) not supported in: "+window.navigator.userAgent)),replacedElement.style[property]?replacedElement.style[property]=value:replacedElement.style.property=value;break;case"length":case"parentRule":}wrapperElement.setAttribute("class","x-object-fit-"+args.fittype),replacedElement.parentNode.insertBefore(wrapperElement,replacedElement),wrapperElement.appendChild(replacedElement),objectFit.orientation(replacedElement);var resizeTimer=null,resizeAction=function(){null!==resizeTimer&&window.cancelAnimationFrame(resizeTimer),resizeTimer=window.requestAnimationFrame(function(){objectFit.orientation(replacedElement)})};switch(args.fittype){default:break;case"contain":case"cover":window.addEventListener?(replacedElement.addEventListener("load",resizeAction,!1),window.addEventListener("resize",resizeAction,!1),window.addEventListener("orientationchange",resizeAction,!1)):(replacedElement.attachEvent("onload",resizeAction),window.attachEvent("onresize",resizeAction))}},objectFit.listen=function(args){var domInsertedAction=function(element){for(var i=0,argsLength=args.length;argsLength>i;i++)(element.mozMatchesSelector&&element.mozMatchesSelector(args[i].selector)||element.msMatchesSelector&&element.msMatchesSelector(args[i].selector)||element.oMatchesSelector&&element.oMatchesSelector(args[i].selector)||element.webkitMatchesSelector&&element.webkitMatchesSelector(args[i].selector))&&(args[i].replacedElements=[element],objectFit.process(args[i]),objectFit._debug&&window.console&&console.log("Matching node inserted: "+element.nodeName))},domInsertedObserverFunction=function(element){objectFit.observer.disconnect(),domInsertedAction(element),objectFit.observer.observe(document.documentElement,{childList:!0,subtree:!0})},domInsertedEventFunction=function(event){window.removeEventListener("DOMNodeInserted",domInsertedEventFunction,!1),domInsertedAction(event.target),window.addEventListener("DOMNodeInserted",domInsertedEventFunction,!1)},domRemovedAction=function(element){"x-object-fit"===element.nodeName.toLowerCase()&&(element.parentNode.removeChild(element),objectFit._debug&&window.console&&console.log("Matching node removed: "+element.nodeName))},domRemovedObserverFunction=function(element){objectFit.observer.disconnect(),domRemovedAction(element),objectFit.observer.observe(document.documentElement,{childList:!0,subtree:!0})},domRemovedEventFunction=function(event){window.removeEventListener("DOMNodeRemoved",domRemovedEventFunction,!1),domRemovedAction(event.target.parentNode),window.addEventListener("DOMNodeRemoved",domRemovedEventFunction,!1)};window.MutationObserver?(objectFit._debug&&window.console&&console.log("DOM MutationObserver"),this.observer=new MutationObserver(function(mutations){mutations.forEach(function(mutation){if(mutation.addedNodes&&mutation.addedNodes.length)for(var nodes=mutation.addedNodes,i=0,nodesLength=nodes.length;nodesLength>i;i++)domInsertedObserverFunction(nodes[i]);mutation.removedNodes&&mutation.removedNodes.length&&domRemovedObserverFunction(mutation.target)})}),this.observer.observe(document.documentElement,{childList:!0,subtree:!0})):window.addEventListener&&(objectFit._debug&&window.console&&console.log("DOM Mutation Events"),window.addEventListener("DOMNodeInserted",domInsertedEventFunction,!1),window.addEventListener("DOMNodeRemoved",domRemovedEventFunction,!1))},objectFit.init=function(args){if(args){args instanceof Array||(args=[args]);for(var i=0,argsLength=args.length;argsLength>i;i++)args[i].replacedElements=document.querySelectorAll(args[i].selector),this.process(args[i]);this.listen(args)}},objectFit.polyfill=function(args){"objectFit"in document.documentElement.style==!1?(objectFit._debug&&window.console&&console.log("object-fit not natively supported"),"complete"===document.readyState?objectFit.init(args):window.addEventListener?window.addEventListener("load",function(){objectFit.init(args)},!1):window.attachEvent("onload",function(){objectFit.init(args)})):objectFit._debug&&window.console&&console.log("object-fit natively supported")},"object"==typeof module&&module&&"object"==typeof module.exports?module.exports=objectFit:"function"==typeof define&&define.amd?define([],function(){return objectFit}):"object"==typeof global&&"object"==typeof global.document&&(global.objectFit=objectFit)}(window);
/*
    objectFit.polyfill({
        selector: 'video', // this can be any CSS selector
        fittype: 'cover', // either contain, cover, fill or none
        disableCrossDomain: 'true' // either 'true' or 'false' to not parse external CSS files.
    });
*/

// Onclick action to open/close offcanvas menu
jQuery(document).ready(function($) {
	$('#toggler').on('click',function(e){
		$('.menu-btn.text').fadeOut();
	});
	$('#parent').on('click', '.active', function() {
	    $('.menu-btn.text').fadeIn();
	});
});

