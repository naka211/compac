var JFormValidator=function(){"use strict";var t,e,a,r=function(e,a,r){r=""===r?!0:r,t[e]={enabled:r,exec:a}},n=function(t,e){var a,r=jQuery(e);return t?(a=r.find("#"+t+"-lbl"),a.length?a:(a=r.find('label[for="'+t+'"]'),a.length?a:!1)):!1},i=function(t,e){var a=e.data("label");void 0===a&&(a=n(e.attr("id"),e.get(0).form),e.data("label",a)),t===!1?(e.addClass("invalid").attr("aria-invalid","true"),a&&a.addClass("invalid").attr("aria-invalid","true")):(e.removeClass("invalid").attr("aria-invalid","false"),a&&a.removeClass("invalid").attr("aria-invalid","false"))},l=function(e){var a,r,n=jQuery(e);if(n.attr("disabled"))return i(!0,n),!0;if(n.attr("required")||n.hasClass("required"))if(a=n.prop("tagName").toLowerCase(),"fieldset"===a&&(n.hasClass("radio")||n.hasClass("checkboxes"))){if(!n.find("input:checked").length)return i(!1,n),!1}else if(!n.val()||n.hasClass("placeholder")||"checkbox"===n.attr("type")&&!n.is(":checked"))return i(!1,n),!1;return r=n.attr("class")&&n.attr("class").match(/validate-([a-zA-Z0-9\_\-]+)/)?n.attr("class").match(/validate-([a-zA-Z0-9\_\-]+)/)[1]:"",""===r?(i(!0,n),!0):r&&"none"!==r&&t[r]&&n.val()&&t[r].exec(n.val(),n)!==!0?(i(!1,n),!1):(i(!0,n),!0)},u=function(t){var e,r,n,i,u,s,o=!0,d=[];for(e=jQuery(t).find("input, textarea, select, fieldset"),u=0,s=e.length;s>u;u++)l(e[u])===!1&&(o=!1,d.push(e[u]));if(jQuery.each(a,function(t,e){e.exec()!==!0&&(o=!1)}),!o&&d.length>0){for(r=Joomla.JText._("JLIB_FORM_FIELD_INVALID"),n={error:[]},u=d.length-1;u>=0;u--)i=jQuery(d[u]).data("label"),i&&n.error.push(r+i.text().replace("*",""));Joomla.renderMessages(n)}return o},s=function(t){var a,r=[],n=jQuery(t);a=n.find("input, textarea, select, fieldset, button");for(var i=0,s=a.length;s>i;i++){var o=jQuery(a[i]),d=o.prop("tagName").toLowerCase();"input"!==d&&"button"!==d||"submit"!==o.attr("type")&&"image"!==o.attr("type")?"button"===d||"input"===d&&"button"===o.attr("type")||(o.hasClass("required")&&o.attr("aria-required","true").attr("required","required"),"fieldset"!==d&&(o.bind("blur",function(){return l(this)}),o.hasClass("validate-email")&&e&&(o.get(0).type="email")),r.push(o)):o.hasClass("validate")&&o.bind("click",function(){return u(t)})}n.data("inputfields",r)},o=function(){t={},a=a||{},e=function(){var t=document.createElement("input");return t.setAttribute("type","email"),"text"!==t.type}(),r("username",function(t){var e=new RegExp("[<|>|\"|'|%|;|(|)|&]","i");return!e.test(t)}),r("password",function(t){var e=/^\S[\S ]{2,98}\S$/;return e.test(t)}),r("numeric",function(t){var e=/^(\d|-)?(\d|,)*\.?\d*$/;return e.test(t)}),r("email",function(t){t=punycode.toASCII(t);var e=/^[a-zA-Z0-9.!#$%&’*+\/=?^_`{|}~-]+@[a-zA-Z0-9-]+(?:\.[a-zA-Z0-9-]+)*$/;return e.test(t)});for(var n=jQuery("form.form-validate"),i=0,l=n.length;l>i;i++)s(n[i])};return o(),{isValid:u,validate:l,setHandler:r,attachToForm:s,custom:a}};document.formvalidator=null,jQuery(function(){document.formvalidator=new JFormValidator});
