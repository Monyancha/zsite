jQuery.fn.LoadImage=function(E,_,C,A,B,D){if(B==null)B="default.gif";return this.each(function(){var F=$(this),I=$(this).parent(),L=$(this).attr("src"),J=new Image();J.src=L;var K=function(){if(E)if(J.width>0&&J.height>0)if(C>0&&A>0){if(J.width/J.height>=C/A){if(J.width>C){F.width(C);F.height((J.height*C)/J.width)}else{F.width(J.width);F.height(J.height)}}else if(J.height>A){F.height(A);F.width((J.width*A)/J.height)}else{F.width(J.width);F.height(J.height)}}else{if(C==0)if(J.height>A){F.height(A);F.width((J.width*A)/J.height)}if(A==0)if(J.width>C){F.width(C);F.height((J.height*C)/J.width)}}};if(J.complete){K();if(D){F.parent().width(F.width());F.parent().height(F.height())}if(_&&A!=0){var G=parseInt((A-F.height())/2);if(D)F.parent().css("margin-top",G);else F.css("margin-top",G)}return}$(this).attr("src","");var H=$("<img alt=\"Loading...\" title=\"Loading...\" src=\""+B+"\" />");F.hide();F.after(H);$(J).load(function(){K();if(D){F.parent().width(F.width());F.parent().height(F.height())}if(_&&A!=0){var $=parseInt((A-F.height())/2);if(D)F.parent().css("margin-top",$);else F.css("margin-top",$)}H.remove();F.attr("src",this.src);F.show()})})}
