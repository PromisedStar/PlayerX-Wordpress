(function ($) {
	'use strict';

	var dashboard = {};

	dashboard.edgtfOnDocumentReady = edgtfOnDocumentReady;

	$(document).ready(edgtfOnDocumentReady);

	/**
	 *  All functions to be called on $(document).ready() should be in edgtfImport function
	 **/
	function edgtfOnDocumentReady() {
		edgtfThemeRegistration.init();
		edgtfImport.init();
		edgtfThemeSelectDemo();
		edgtfInitSwitch();
	}

	var edgtfImport = {
		importDemo: '',
		importImages: 0,
		counterStep: 0,
		contentCounter: 0,
		totalPercent: 0,
		contentFlag: false,
		allFlag: false,
		contentFinished: false,
		allFinished: false,
		repeatFiles: [],

		init: function () {
			edgtfImport.holder = $('.edgtf-cd-import-form');

			if (edgtfImport.holder.length) {
				edgtfImport.holder.each(function () {
					var edgtfImportBtn = $('#edgtf-import-demo-data'),
						importAction = $('.edgtf-cd-import-option'),
						importDemoElement = $('.edgtf-import-demo'),
						confirmMessage = edgtfImport.holder.data('confirm-message');

					importAction.on('change', function (e) {
						edgtfImport.populateSinglePage(importAction.val(), $('.edgtf-import-demo').val(), false);
					});
					importDemoElement.on('change', function (e) {
						edgtfImport.populateSinglePage(importAction.val(), $('.edgtf-import-demo').val(), true);
					});
					edgtfImportBtn.on('click', function (e) {
						e.preventDefault();
						edgtfImport.reset();
						edgtfImport.importImages = $('.edgtf-cd-import-attachments').is(':checked') ? 1 : 0;
						edgtfImport.importDemo = importDemoElement.val();

						if (confirm(confirmMessage)) {
							$('.edgtf-cd-box-form-section-progress').show();
							$(this).addClass('edgtf-import-demo-data-disabled');
							$(this).attr("disabled", true);
							edgtfImport.initImportType(importAction.val());
						}
					});
				});
			}
		},

		initImportType: function (action) {
			switch (action) {
				case 'widgets':
					edgtfImport.importWidgets();
					break;
				case 'options':
					edgtfImport.importOptions();
					break;
				case 'content':
					edgtfImport.contentFlag = true;
					edgtfImport.importContent();
					break;
				case 'complete':
					edgtfImport.allFlag = true;
					edgtfImport.importAll();
					break;
				case 'single-page':
					edgtfImport.importSinglePage();
					break;
			}
		},

		importWidgets: function () {
			var data = {
				action: 'widgets',
				demo: edgtfImport.importDemo
			};
			edgtfImport.importAjax(data);
		},

		importOptions: function () {
			var data = {
				action: 'options',
				demo: edgtfImport.importDemo
			};
			edgtfImport.importAjax(data);
		},

		importSettingsPages: function () {
			var data = {
				action: 'settings-page',
				demo: edgtfImport.importDemo
			};
			edgtfImport.importAjax(data);
		},

		importMenuSettings: function () {
			var data = {
				action: 'menu-settings',
				demo: edgtfImport.importDemo
			};
			edgtfImport.importAjax(data);
		},

		importRevSlider: function () {
			var data = {
				action: 'rev-slider',
				demo: edgtfImport.importDemo
			};
			edgtfImport.importAjax(data);
		},

		importContent: function () {
			if (edgtfImport.contentCounter == 0) {
				edgtfImport.importTerms();
			}
			if (edgtfImport.contentCounter == 1) {
				edgtfImport.importAttachments();
			}
			if ((edgtfImport.contentCounter > 1 && edgtfImport.contentCounter < 20) && edgtfImport.repeatFiles.length) {
				edgtfImport.importAttachments(true);
			}
			if (edgtfImport.contentCounter == 20) {
				edgtfImport.importPosts();
			}
		},

		importAll: function () {

			if (edgtfImport.contentCounter < 21) {
				edgtfImport.importContent();
			} else {
				edgtfImport.contentFinished = true;
			}

			if (edgtfImport.contentFinished && !edgtfImport.allFinished) {
				edgtfImport.importWidgets();
				edgtfImport.importOptions();
				edgtfImport.importSettingsPages();
				edgtfImport.importMenuSettings();
				edgtfImport.importRevSlider();
				edgtfImport.allFinished = true;
			}

		},
		importTerms: function () {
			var data = {
				action: 'content',
				xml: 'playerx_content_0.xml',
				contentStart: true
			};
			edgtfImport.importAjax(data);
		},
		importPosts: function () {
			var data = {
				action: 'content',
				xml: 'playerx_content_20.xml',
				updateURL: true
			};
			edgtfImport.importAjax(data);
		},

		importSinglePage: function () {
			var postId = $('#import_single_page').val();
			var data = {
				action: 'content',
				xml: 'playerx_content_20.xml',
				post_id: postId
			};
			edgtfImport.importAjax(data);
		},

		importAttachments: function (repeat) {
			if (edgtfImport.repeatFiles.length && repeat) {
				edgtfImport.repeatFiles.forEach(function (index) {
					var data = {
						action: 'content',
						xml: index,
						images: edgtfImport.importImages
					};
					edgtfImport.importAjax(data);
				});
				edgtfImport.repeatFiles = [];

			}

			if (!repeat) {
				for (var i = 1; i < 20; i++) {
					var xml = i < 20 ? 'playerx_content_' + i + '.xml' : 'playerx_content_' + i + '.xml';
					var data = {
						action: 'content',
						xml: xml,
						images: edgtfImport.importImages
					};
					edgtfImport.importAjax(data);
				}
			}
		},

		importAjax: function (options) {
			var defaults = {
				demo: edgtfImport.importDemo,
				nonce: $('#edgtf_cd_import_nonce').val()
			};
			$.extend(defaults, options);
			$.ajax({
				type: 'POST',
				url: ajaxurl,
				data: {
					action: 'import_action',
					options: defaults
				},
				success: function (data) {
					var response = JSON.parse(data);
					edgtfImport.ajaxSuccess(response);
				},
				error: function (data) {
					var response = JSON.parse(data);
					edgtfImport.ajaxError(response, options);
				}
			});
		},

		importProgress: function () {
			if (!edgtfImport.contentFlag && !edgtfImport.allFlag) {
				edgtfImport.totalPercent = 100;
			} else if (edgtfImport.contentFlag) {
				if (edgtfImport.contentCounter < 21) {
					edgtfImport.totalPercent += 4.5;
				} else if (edgtfImport.contentCounter == 21) {
					edgtfImport.totalPercent += 10;
				}
			} else if (edgtfImport.allFlag) {
				if (edgtfImport.contentCounter < 21) {
					edgtfImport.totalPercent += 4;
				} else if (edgtfImport.contentCounter == 21) {
					edgtfImport.totalPercent += 10;
				} else {
					edgtfImport.totalPercent += 2;
				}
			}

			$('#edgtf-progress-bar').val(edgtfImport.totalPercent);
			$('.edgtf-cd-progress-percent').html(Math.round(edgtfImport.totalPercent) + '%');

			if (edgtfImport.totalPercent == 100) {
				$('#edgtf-import-demo-data').remove('.edgtf-import-demo-data-disabled');
				$('.edgtf-cd-import-is-completed').show();

			}
		},

		ajaxSuccess: function (response) {
			if (typeof response.status !== 'undefined' && response.status == 'success') {
				if (edgtfImport.contentFlag) {
					edgtfImport.contentCounter++;
					edgtfImport.importContent();
				}
				if (edgtfImport.allFlag) {
					edgtfImport.contentCounter++;
					edgtfImport.importAll();
				}
				edgtfImport.importProgress();
			} else {
				if (typeof response.data.type !== 'undefined' && response.data.type == 'content') {
					edgtfImport.repeatFiles.push(response.data['xml'])
				} else if (typeof response.data.type !== 'undefined' && response.data.type == 'options') {
					$('#edgtf-import-demo-data').remove('.edgtf-import-demo-data-disabled');
					$('.edgtf-cd-import-went-wrong').show();

				}
			}
		},

		ajaxError: function (response, options) {
			if ("xml" in options) {
				if (edgtfImport.contentFlag) {
					edgtfImport.importContent();
				}
				if (edgtfImport.allFlag) {
					edgtfImport.importAll();
				}
				edgtfImport.repeatFiles.push(options.xml);

			}
		},

		reset: function () {
			edgtfImport.totalPercent = 0;
			$('#edgtf-progress-bar').val(0);
		},

		populateSinglePage: function (value, demo, demoChange) {
			var holder = $('.edgtf-cd-box-form-section-dependency'),
				options = {
					demo: demo,
					nonce: $('#edgtf_cd_import_nonce').val()
				};

			if (value == 'single-page') {
				if (holder.children().length == 0 || demoChange) {

					$.ajax({
						type: 'POST',
						url: ajaxurl,
						data: {
							action: 'populate_single_pages',
							options: options
						},
						success: function (data) {
							var response = $.parseJSON(data);
							if (response.status == 'success') {
								$('.edgtf-cd-box-form-section-dependency').html(response.data);
								var singlePageList = $('select.edgtf-cd-import-single-page');
								holder.show();
								singlePageList.select2({
									dropdownCssClass: "edgtf-cd-single-page-selection"
								});
							} else {
								holder.html(response.message);
								holder.show();
							}
						}
					});
				} else {
					holder.show();
				}

			} else {
				holder.hide();
			}
		},
	};

	var edgtfThemeRegistration = {
		init: function () {
			edgtfThemeRegistration.holder = $('#edgtf-register-purchase-form');

			if (edgtfThemeRegistration.holder.length) {
				edgtfThemeRegistration.holder.each(function () {

					var form = $(this);

					var edgtfRegistrationBtn = $(this).find('#edgtf-register-purchase-key'),
						edgtfdeRegistrationBtn = $(this).find('#edgtf-deregister-purchase-key');

					edgtfRegistrationBtn.on('click', function (e) {
						e.preventDefault();
						$(this).addClass('edgtf-cd-button-disabled');
						$(this).attr("disabled", true);
						$(this).siblings('.edgtf-cd-button-wait').show();
						if (edgtfThemeRegistration.validateFields(form)) {
							var post = form.serialize();
							edgtfThemeRegistration.registration(post);
						} else {
							$(this).removeClass('edgtf-cd-button-disabled');
							$(this).attr("disabled", false);
							$(this).siblings('.edgtf-cd-button-wait').hide();
						}

					});

					edgtfdeRegistrationBtn.on('click', function (e) {
						$(this).addClass('edgtf-cd-button-disabled');
						$(this).attr("disabled", true);
						$(this).siblings('.edgtf-cd-button-wait').show();
						e.preventDefault();
						edgtfThemeRegistration.deregistration();
					});
				});
			}
		},

		registration: function (post) {
			var data = {
				action: 'register',
				post: post
			};
			edgtfThemeRegistration.registrationAjax(data);
		},

		deregistration: function () {
			var data = {
				action: 'deregister',
			};
			edgtfThemeRegistration.registrationAjax(data);
		},

		validateFields: function (form) {
			if (edgtfThemeRegistration.validatePurchaseCode(form) && edgtfThemeRegistration.validateEmail(form)) {
				return true
			}
		},

		validateEmail: function (form) {
			var email = form.find("[name='email']");
			var emailVal = email.val();
			var regex = /^([a-zA-Z0-9_.+-])+\@(([a-zA-Z0-9-])+\.)+([a-zA-Z0-9]{2,4})+$/;

			if (emailVal !== '' && regex.test(emailVal)) {
				email.removeClass('edgtf-cd-error-field');
				email.parent().find('.edgtf-cd-error-message').remove();
				return true
			} else if (emailVal == '') {
				email.addClass('edgtf-cd-error-field');
				edgtfThemeRegistration.errorMessage(email.parent().data("empty-field"), email.parent());
			} else if (!regex.test(emailVal)) {
				email.addClass('edgtf-cd-error-field');
				edgtfThemeRegistration.errorMessage(email.parent().data("invalid-field"), email.parent());
			}
		},

		validatePurchaseCode: function (form) {
			var purchaseCode = form.find("[name='purchase_code']");
			var purchaseCodeVal = purchaseCode.val();

			if (purchaseCodeVal !== '') {
				purchaseCode.removeClass('edgtf-cd-error-field');
				purchaseCode.parent().find('.edgtf-cd-error-message').remove();
				return true
			} else {
				edgtfThemeRegistration.errorMessage(purchaseCode.parent().data("empty-field"), purchaseCode.parent());
				purchaseCode.addClass('edgtf-cd-error-field');
			}
		},

		errorMessage: function (message, target) {
			target.find('.edgtf-cd-error-message').remove();
			$('<span class="edgtf-cd-error-message"></span>').text(message).appendTo(target);
		},

		registrationAjax: function (options) {
			$.ajax({
				type: 'POST',
				url: edgtfCoreDashboardGlobalVars.vars.restUrl + edgtfCoreDashboardGlobalVars.vars.registrationThemeRoute,
				data: {
					options: options
				},
				beforeSend: function ( request ) {
					request.setRequestHeader(
						'X-WP-Nonce',
						edgtfCoreDashboardGlobalVars.vars.restNonce
					);
				},
				success: function (response) {
					if (response.status == 'success') {
						location.reload();
					} else if (response.status == 'error' && ((typeof response.data['purchase_code'] !== 'undefined' && response.data['purchase_code'] === false) || (typeof response.data['already_used'] !== 'undefined' && response.data['already_used'] === true))) {
						edgtfThemeRegistration.errorMessage(response.message, $("[name='purchase_code']").parent());
						$('#edgtf-register-purchase-key').removeClass('edgtf-cd-button-disabled');
						$('#edgtf-register-purchase-key').attr("disabled", false);
						$('#edgtf-register-purchase-key').siblings('.edgtf-cd-button-wait').hide();
					} else if (response.status == 'error') {
						alert(response.message);
					}

				},
				error: function (response) {
					console.log(response);
				}
			});
		}
	};


	function edgtfThemeSelectStyles(selection) {
		if (!selection.id) {
			return selection.text;
		}

		var thumb = $(selection.element).data('thumb');
		if (!thumb) {
			return selection.text;
		} else {
			var $selection = $(
				'<img src="' + thumb + '" alt="Demo Thumbnail"><span class="img-changer-text">' + $(selection.element).text() + '</span>'
			);
			return $selection;
		}
	}

	function edgtfThemeSelectDemo() {
		var themeList = $('select.edgtf-import-demo');

		themeList.select2({
			templateResult: edgtfThemeSelectStyles,
			minimumResultsForSearch: -1,
			dropdownCssClass: "edgtf-cd-selection"
		});

		var optionList = $('select.edgtf-cd-import-option');
		optionList.select2({
			minimumResultsForSearch: -1,
			dropdownCssClass: "edgtf-cd-action-selection"
		});
	}

	function edgtfInitSwitch() {
		$(".edgtf-cd-cb-enable").on('click', function () {
			var parent = $(this).parents('.edgtf-cd-switch');
			$('.edgtf-cd-cb-disable', parent).removeClass('selected');
			$(this).addClass('selected');
			$('.edgtf-cd-import-attachments', parent).attr('checked', true);
		});

		$(".edgtf-cd-cb-disable").on('click', function () {
			var parent = $(this).parents('.edgtf-cd-switch');
			$('.edgtf-cd-cb-enable', parent).removeClass('selected');
			$(this).addClass('selected');
			$('.edgtf-cd-import-attachments', parent).attr('checked', false);
		});
	}

})(jQuery);