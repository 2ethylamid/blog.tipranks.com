tinymce.PluginManager.add("directionality",function(e){function t(t){var n,i=e.dom,a=e.selection.getSelectedBlocks();a.length&&(n=i.getAttrib(a[0],"dir"),tinymce.each(a,function(e){i.getParent(e.parentNode,"*[dir='"+t+"']",i.getRoot())||(n!=t?i.setAttrib(e,"dir",t):i.setAttrib(e,"dir",null))}),e.nodeChanged())}function n(e){var t=[];return tinymce.each("h1 h2 h3 h4 h5 h6 div p".split(" "),function(n){t.push(n+"[dir="+e+"]")}),t.join(",")}e.addCommand("mceDirectionLTR",function(){t("ltr")}),e.addCommand("mceDirectionRTL",function(){t("rtl")}),e.addButton("ltr",{title:"Left to right",cmd:"mceDirectionLTR",stateSelector:n("ltr")}),e.addButton("rtl",{title:"Right to left",cmd:"mceDirectionRTL",stateSelector:n("rtl")})});