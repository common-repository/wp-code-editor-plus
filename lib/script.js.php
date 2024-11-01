<?php header('Content-type: application/javascript'); ?>

function getFilename(s){
	fObj = parseUri(s);
	return fObj.file;
}
function getFileExt(s){
	return s.split('.').pop();
}

function parseUri (s) {
	var	o   = parseUri.options,
		m   = o.parser[o.strictMode ? "strict" : "loose"].exec(s),
		uri = {},
		i   = 14;

	while (i--) uri[o.key[i]] = m[i] || "";

	uri[o.q.name] = {};
	uri[o.key[12]].replace(o.q.parser, function ($0, $1, $2) {
		if ($1) uri[o.q.name][$1] = $2;
	});

	return uri;
};

parseUri.options = {
	strictMode: false,
	key: ["source","protocol","authority","userInfo","user","password","host","port","relative","path","directory","file","query","anchor"],
	q:   {
		name:   "queryKey",
		parser: /(?:^|&)([^&=]*)=?([^&]*)/g
	},
	parser: {
		strict: /^(?:([^:\/?#]+):)?(?:\/\/((?:(([^:@]*)(?::([^:@]*))?)?@)?([^:\/?#]*)(?::(\d*))?))?((((?:[^?#\/]*\/)*)([^?#]*))(?:\?([^#]*))?(?:#(.*))?)/,
		loose:  /^(?:(?![^:@]+:[^:@\/]*@)([^:\/?#.]+):)?(?:\/\/)?((?:(([^:@]*)(?::([^:@]*))?)?@)?([^:\/?#]*)(?::(\d*))?)(((\/(?:[^?#](?![^?#\/]*\.[^?#\/.]+(?:[?#]|$)))*\/?)?([^?#\/]*))(?:\?([^#]*))?(?:#(.*))?)/
	}
};







jQuery(document).ready(function($){
	var documentNumber = 0;
	var windowsMinimized = 0;
	var wpcepOffsetX = 25;
	var wpcepOffsetY = 35;

	$('.wrap h2:eq(0)').text('WP Code Editor Plus');
	$('.wrap').append('<h3>By RingZer0</h3> \
		<div class="readme-wrap"> \
			<p>Features now include: \
				<ol> \
					<li>Open multiple code files (per theme/plugin)</li> \
					<li>Drag &amp; resize code windows</li> \
					<li>Minimize, Maximize &amp; Close code windows</li> \
					<li>Save files asyncrounsly</li> \
					<li>Bring window to front via double-click of the title-bar</li> \
				</ol> \
			</p><p> \
				The community has suggested improved window positioning when new \
				windows are opened, minimized, restored.  As well as \
				quick-positioning for &quot;Tiled&quot; (horizontal and verticle) \
				for easy code compaison.  I sincerely hope you enjoy this and find \
				good use for it.  I would like to give my community-driven plugins \
				a home, so I have opened the ability for the community to help make \
				that possible with a donation.  After hosting is fully covered, I will \
				use aditional donation for my biggest vice that keeps me going... \
				coffee :D \
			</p> \
			<form action="https://www.paypal.com/cgi-bin/webscr" method="post" target="_blank"> \
			<input type="hidden" name="cmd" value="_s-xclick"> \
			<input type="hidden" name="encrypted" value="-----BEGIN PKCS7-----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-----END PKCS7-----"> \
			<input type="image" src="https://www.paypalobjects.com/WEBSCR-640-20110306-1/en_US/i/btn/btn_donate_SM.gif" border="0" name="submit" target="_blank" alt="PayPal - The safer, easier way to pay online!"> \
			<img alt="" border="0" src="https://www.paypalobjects.com/WEBSCR-640-20110306-1/en_US/i/scr/pixel.gif" width="1" height="1"> \
			</form> \
		</div>');



	// START * FILE NAME AUTO COMPLETE 
	$('#templateside').prepend('<h3>Quick Open</h3><form id="wpcep_formsuggest" method="get" action="?action=filter"> \
		<input type="text" id="wpcep_inputsuggest" style="width:95%;margin-top:6px;" /> \
		</form><hr />');

	var files = new Array();
	$('.nonessential').each(function(){
		files.push($(this).text().replace('(','').replace(')',''));
	});

	$('#wpcep_inputsuggest').autocomplete(files);

	$('#wpcep_formsuggest').submit(function(){
		$('.nonessential:contains("'+$('#wpcep_inputsuggest').val()+'")').parents('a:eq(0)').click();
		return false;
	});

	// END * FILE NAME AUTO COMPLETE 


	// Reset origional IDS as classes (this enables multiple file editing)
	$('#template').addClass('template');
	$('#template').attr('id','template_'+documentNumber);

	$('body').append('<div id="wpcep_minimize_wrap"></div>');

	function windowize(initialContentWrapperSelector,newWrapperId,newWrapperClass,windowTitleText){
		$(initialContentWrapperSelector).wrap('<div id="'+newWrapperId+'" class="wpcep_wrap '+newWrapperClass+'"></div>');
		$(initialContentWrapperSelector).wrap('<div class="wpcep_scrollable_inner_wrap"></div>');
		$('#'+newWrapperId).prepend('<div id="'+newWrapperId+'_titlebar" class="wpcep_titlebar"><span class="cpcep_titletext">'+windowTitleText+'</span></div>');

		$('#'+newWrapperId).resizable({
			start: function(event, ui) {
				$('body').append($(this));
			}
		});
		$('#'+newWrapperId).draggable({
			start: function(event, ui) {
				$('body').append($(this));
			},
			handle: '#'+newWrapperId+'_titlebar'
		});
	}

	function makeCodeWindow(newForm,i){
			// Setup HTML Elements
			var ta = newForm.find('#newcontent');

			/* newForm == .template / #template - The following classes & IDS
			 * are changed to allow for duplicate windows */

			newForm.attr('id','template_'+i);
			newForm.addClass('template')
			newForm.css('display','none');
			ta.addClass('newcontent').attr('id','newcontent_'+i);

			var fullFile = newForm.find('input[name="file"]').val();
			var filename = getFilename(fullFile);
			var ext = getFileExt(filename);

			switch(ext){
				case "php":
					var editor = CodeMirror.fromTextArea(ta[0], {
						lineNumbers: true,
						matchBrackets: true,
						mode: "application/x-httpd-php",
						indentUnit: 4,
						indentWithTabs: true,
						enterMode: "keep",
						tabMode: "shift"
					});
				break;
				case "js":
					var editor = CodeMirror.fromTextArea(ta[0], {
						lineNumbers: true,
						matchBrackets: true,
						mode: "text/javascript",
						indentUnit: 4,
						indentWithTabs: true,
						enterMode: "keep",
						tabMode: "shift",
						onKeyEvent: function(i, e) {
							// Hook into ctrl-space
							if (e.keyCode == 32 && (e.ctrlKey || e.metaKey) && !e.altKey) return startComplete();
						}

					});
				break;
				case "css":
					var editor = CodeMirror.fromTextArea(ta[0], {
						lineNumbers: true,
						matchBrackets: true,
						mode: "text/css",
						indentUnit: 4,
						indentWithTabs: true,
						enterMode: "keep",
						tabMode: "shift"
					});
				break;
				case "txt":
					var editor = CodeMirror.fromTextArea(ta[0], {
						lineNumbers: true,
						mode: "text",
						indentUnit: 4,
					});
				break;
			}


			newForm.find('.CodeMirror').parent().addClass('cm_wrap');

			// Apply New HTML
			$('body').append(newForm);
			windowize('#template_'+i,'window_wrap_'+i,'wpcep_window_code','WP Code Editor Plus <sup>('+i+')</sup> | ['+filename+']');

			var w = $('#template_'+i).parents('.wpcep_wrap');



			// Calculate new window position based on open windows
			// TODO: Set top/left offset from opened window
			var topWindow = $('.wpcep_wrap:last');

			var openWindows = $('.wpcep_window_code').not('.wpcep_minimized').length;
			var pxTop  = openWindows * wpcepOffsetY;
			var pxLeft = openWindows * wpcepOffsetX;

			w.css({
				display  : 'none',
				top      : pxTop+'px',
				left     : pxLeft+'px'
			});

			$('#template_'+i).css('display','block');

			/* This hack is because the horizontal scrollbar is causing the 100%
			 * heights to overflow in some browsers...  The .CodeMirror already 
			 * controls its own overflow, and does not need the wrapper to,
			 * however all other window'd items need to have overflow control on
			 * the inner content of the window.  Overflow cannot be set at the
			 * window level as there is a jquery-ui bug with resizable.  If
			 * anyone wants to try to find a prettier css solution, feel free to
			 * remove the following line, then send me the css that works. */
			w.find('.wpcep_scrollable_inner_wrap').css('overflow','visible');
			w.find('.wpcep_titlebar').prepend('\
			<div class="window_controls"> \
				<a href="#" id="close_button_'+i+'" class="wpcep_closebtn"><img src="'+WPCEP_IMGS+'/close.png" /></a> \
				<a href="#" id="maximize_button_'+i+'" class="wpcep_maximizebtn"><img src="'+WPCEP_IMGS+'/window.png" /></a> \
				<a href="#" id="maximize_button_'+i+'" class="wpcep_restorebtn"><img src="'+WPCEP_IMGS+'/restore.png" /></a> \
				<a href="#" id="minimize_button_'+i+'" class="wpcep_minimizebtn"><img src="'+WPCEP_IMGS+'/minimize.png" /></a> \
			</div>');
			w.find('.template').append('<input type="submit" value="Save" class="wpcep_submit button-primary" />');

			var saveBtn = w.find('.wpcep_submit');
			saveBtn.css('opacity','0.3');


			w.fadeIn();
	}

	var firstForm = jQuery('#template_0').clone();
	jQuery('#template_0').remove();
	makeCodeWindow(firstForm,documentNumber);

	windowize('#documentation','doc_wrap','wpcep_window_infobox','Documentation');
	windowize('#templateside','files_wrap','wpcep_window_rightcol','Files:');
	windowize('.fileedit-sub .alignright','plugins_wrap','wpcep_window_infobox','What would you like to edit?');

	$('body').append($('#documentation').parents('.wpcep_wrap'));

	// To bring windows to the front
	$('.wpcep_titlebar').live('dblclick',function(){
		// var w = $(this).parent().clone();
		// $(this).parent().remove();
		// $('body').append(w);
		 $('body').append($(this).parents('.wpcep_wrap'));
	});

	// Open File (Ajax)
	$('#templateside a').click(function(){
		documentNumber++;

		$.get($(this).attr('href'),function(r){
			var newForm = $(r).find('form#template');
			makeCodeWindow(newForm,documentNumber);
		});
		return false;
	});

	// Save File (Ajax)
	$('.template').live('submit',function(e){
		e.preventDefault();

		var submitBtn = $(this).find('.wpcep_submit');

		submitBtn.val('Updating...');
		submitBtn.attr('disabled','disabled');

		$.post($(this).attr('action'), $(this).serialize(), function(){

			submitBtn.removeAttr('disabled');
			submitBtn.val('Save');

			return false;
		});
		return false;
	});

	// Maximize
	$('.wpcep_maximizebtn').live('click',function(e){
		var w = $(this).parents('.wpcep_wrap');
		var wH = $(window).height() - 60;
		var wW = $(window).width() - 20;

		w.removeClass('wpcep_minimized');

		if (w.hasClass('wpcep_maxed')){
			w.removeClass('wpcep_maxed');
			w.animate({
				height : '450px',
				width  : '60%',
				top    : '50px',
				left   : '20px'
			},250);
		} else {
			w.addClass('wpcep_maxed');
			w.animate({
				top      : '0',
				left     : '0',
				width    : wW+'px',
				height   : wH+'px'
			},250);
		}
	});
		
	// Minimize
	$('.wpcep_minimizebtn').live('click',function(e){
		var w = $(this).parents('.wpcep_wrap');
		var wT = w.find('.cpcep_titletext');

		if (w.hasClass('wpcep_minimized'))
			return;

		w.draggable('disable');
		wT.css('cursor','default');

		// wT.css('display','none');
		w.find('.cpcep_titletext').animate({ left : '-182px'});

		// for minimize animation
		var pxTop = $(window).height()-50;
		var pxLeft = 20 + $('.wpcep_minimized').length * 160;

		w.addClass('wpcep_minimized');

		w.animate({
			height : '0px',
			width  : '150px',
			top    : pxTop+'px',
			left   : pxLeft+'px',
			opacity: 0
		}, 250,
			function(){
				// wT.fadeIn(600);
				$('#wpcep_minimize_wrap').append(w);
				w.css({
					position   : 'relative',
					top        : '0px',
					left       : '0px',
					float      : 'left',
					opacity    : '1'
				});
				w.fadeIn(200);
			}
		);
	});

	// Restore
	$('.wpcep_restorebtn').live('click',function(e){
		var w = $(this).parents('.wpcep_wrap');
		var wT = w.find('.cpcep_titletext');

		if (w.hasClass('wpcep_minimized')){
			
			// wT.css('display','none');

			$('body').append(w);

			var openWindows = $('.wpcep_window_code').not('.wpcep_minimized').length;
			var pxTop  = 50 + openWindows * wpcepOffsetY;
			var pxLeft = 20 + openWindows * wpcepOffsetX;

			w.css({
				position : 'absolute',
				float    : 'none',
				top      : $(window).height()+'px',
				opacity  : '0'
			});
			w.animate({
				height  : '450px',
				width   : '60%',
				opacity : '1',
				top     : pxTop+'px',
				left    : pxLeft+'px'
			}, 250,
				function(){
					w.draggable('enable');
					wT.css('cursor','move');
					w.removeClass('wpcep_minimized');
					wT.css('left','0px');
					// wT.fadeIn(600);
				}
			);
		}
	});

	// Close
	$('.wpcep_closebtn').live('click',function(e){
		if (!confirm("Are you sure you wish to close, we do not have any save detection enabled at this point?"))
			return;

		$(this).parents('.wpcep_wrap').fadeOut(400,function(){ $(this).remove(); });
	});

	// Save Hover
	$('.wpcep_submit').live('mouseover mouseout',function(e){
		if (e.type == 'mouseover'){
			$(this).stop(true,true);
			$(this).animate({opacity : '1'},280);
		} else {
			$(this).stop(true,true);
			$(this).animate({opacity : '0.3'},280);
		}
	});
});
