!function(a){a.fn.highlightTextarea=function(b){var c=["highlight","enable","disable","setOptions","setWords"],d=a(this).data("highlightTextarea");if(d&&"string"==typeof b){if(a.inArray(b,c)!==!1)return d[b].apply(d,Array.prototype.slice.call(arguments,1));throw'Method "'+b+'" does not exist on jQuery.highlightTextarea'}return d||"object"!=typeof b&&b?void 0:(b||(b={}),b=a.extend({},a.fn.highlightTextarea.defaults,b),b.regParam=b.caseSensitive?"g":"gi",this.each(function(){var c=a(this).data("highlightTextarea");c||(c=new a.highlightTextarea(a(this),b),c.init(),a(this).data("highlightTextarea",c))}))},a.fn.highlightTextarea.defaults={words:[],color:"#ffff00",caseSensitive:!0,resizable:!1,id:null,debug:!1},a.highlightTextarea=function(b,c){this.options=c,b instanceof jQuery?this.$textarea=b:this.$textarea=a(b),this.$main=null,this.$highlighterContainer=null,this.$highlighter=null,this.init=function(){this.$textarea.closest(".highlightTextarea").length<=0&&this.$textarea.wrap('<div class="highlightTextarea" />'),this.$main=this.$textarea.parent(".highlightTextarea"),this.$main.find(".highlighterContainer").length<=0&&this.$main.prepend('<div class="highlighterContainer"></div>'),this.$highlighterContainer=this.$main.children(".highlighterContainer"),this.$highlighterContainer.find(".highlighter").length<=0&&this.$highlighterContainer.html('<div class="highlighter"></div>'),this.$highlighter=this.$highlighterContainer.children(".highlighter"),null!=this.options.id&&this.$main.attr("id",this.options.id),this.updateCss(),this.bindEvents(),this.applyResizable(),this.highlight()},this.highlight=function(b){return null==b||0==b?this.applyText(this.$textarea.val()):this.condensator(a.proxy(function(){this.applyText(this.$textarea.val())},this),100,300),this.$textarea.data("highlightTextareaEvents")===!0},this.setOptions=function(b){return"object"!=typeof b&&(b={}),this.options=a.extend({},this.options,b),this.options.regParam=this.options.caseSensitive?"g":"gi",this.options.debug?this.$highlighter.addClass("debug"):this.$highlighter.removeClass("debug"),this.$textarea.data("highlightTextareaEvents")===!0?(this.highlight(),!0):!1},this.setWords=function(a){return"string"==typeof a||a instanceof Array?"string"==typeof a&&(a=[a]):a=[],this.options.words=a,this.$textarea.data("highlightTextareaEvents")===!0?(this.highlight(),!0):!1},this.bindEvents=function(){var b=this.$textarea.data("highlightTextareaEvents");"boolean"==typeof b&&b===!0||(this.$highlighter.on({"click.highlightTextarea":a.proxy(function(){this.$textarea.focus()},this)}),this.$textarea.on({"input.highlightTextarea":a.proxy(function(){this.highlight(!0)},this),"resize.highlightTextarea":a.proxy(function(){this.updateSizePosition(!0)},this),"scroll.highlightTextarea":a.proxy(function(){this.updateSizePosition()},this)}),this.$textarea.data("highlightTextareaEvents",!0))},this.unbindEvents=function(){this.$highlighter.off("click.highlightTextarea"),this.$textarea.off("input.highlightTextarea scroll.highlightTextarea resize.highlightTextarea"),this.$textarea.data("highlightTextareaEvents",!1)},this.enable=function(){this.bindEvents(),this.highlight()},this.disable=function(){this.unbindEvents(),this.$highlighter.html(this.html_entities(this.$textarea.val()))},this.updateCss=function(){this.cloneCss(this.$textarea,this.$main,["float","vertical-align"]),this.$main.css({width:this.$textarea.outerWidth(!0),height:this.$textarea.outerHeight(!0)}),this.cloneCss(this.$textarea,this.$highlighterContainer,["background","background-image","background-color","background-position","background-repeat","background-origin","background-clip","background-size","padding-top","padding-right","padding-bottom","padding-left"]),this.$highlighterContainer.css({top:this.toPx(this.$textarea.css("margin-top"))+this.toPx(this.$textarea.css("border-top-width")),left:this.toPx(this.$textarea.css("margin-left"))+this.toPx(this.$textarea.css("border-left-width")),width:this.$textarea.width(),height:this.$textarea.height()}),this.cloneCss(this.$textarea,this.$highlighter,["font-size","font-family","font-style","font-weight","line-height","vertical-align","word-spacing","text-align"]),this.$highlighter.css({width:this.$textarea.width(),height:this.$textarea.height()}),this.$textarea.css({background:"none"}),this.options.debug&&this.$highlighter.addClass("debug")},this.applyResizable=function(){this.options.resizable&&jQuery.ui&&this.$textarea.resizable({handles:"se",resize:a.proxy(function(){this.updateSizePosition(!0)},this)})},this.applyText=function(a){if(a=this.html_entities(a),this.options.words.length>0){replace=new Array;for(var b=0;b<this.options.words.length;b++)replace.push(this.html_entities(this.options.words[b]));a=a.replace(new RegExp("("+replace.join("|")+")",this.options.regParam),'<span class="highlight" style="background-color:'+this.options.color+';">$1</span>')}this.$highlighter.html(a),this.updateSizePosition()},this.updateSizePosition=function(a){if(a&&(this.$main.css({width:this.$textarea.outerWidth(!0),height:this.$textarea.outerHeight(!0)}),this.$highlighterContainer.css({width:this.$textarea.width(),height:this.$textarea.height()})),this.$textarea[0].clientHeight<this.$textarea[0].scrollHeight&&"hidden"!=this.$textarea.css("overflow")&&"hidden"!=this.$textarea.css("overflow-y")||"scroll"==this.$textarea.css("overflow")||"scroll"==this.$textarea.css("overflow-y"))var b=18;else var b=5;this.$highlighter.css({width:this.$textarea.width()-b,height:this.$textarea.height()+this.$textarea.scrollTop(),"padding-right":b,top:-this.$textarea.scrollTop()})},this.cloneCss=function(a,b,c){for(var d=0;d<c.length;d++)b.css(c[d],a.css(c[d]))},this.toPx=function(b){if(b!=b.replace("em","")){var c=parseFloat(b.replace("em","")),d=a('<div style="display:none;font-size:1em;margin:0;padding:0;height:auto;line-height:1;border:0;">&nbsp;</div>').appendTo("body"),e=d.height();return d.remove(),Math.round(c*e)}return b!=b.replace("px","")?parseInt(b.replace("px","")):parseInt(b)},this.html_entities=function(b){return b?a("<div />").text(b).html():""};var d=null,e=null;this.condensator=function(a,b,c){null==c&&(c=b);var f=new Date;clearTimeout(d),null==e&&(e=f.getTime()),f.getTime()-e>c?(a.call(),e=f.getTime()):d=setTimeout(a,b)}}}(jQuery);
//# sourceMappingURL=jquery.highlighttextarea.js.map