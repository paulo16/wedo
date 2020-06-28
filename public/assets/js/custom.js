$(function () {
	"use strict";

	var o = function () {
		var o = 390,
			n = (window.innerHeight > 0 ? window.innerHeight : this.screen.height) - 1;
		n -= o, 1 > n && (n = 1), n > o && $(".page-wrapper").css("min-height", n + "px")
	};

	$(window).ready(o), $(window).on("resize", o), $(function () {
		$('[data-toggle="tooltip"]').tooltip()
	}), $(function () {
		$('[data-toggle="popover"]').popover()
	}), jQuery(document).on("click", ".nav-dropdown", function (o) {
		o.stopPropagation()
	}), jQuery(document).on("click", ".navbar-nav > .dropdown", function (o) {
		o.stopPropagation()
	}), $(".dropdown-submenu").on("click", function () {
		$(".dropdown-submenu > .dropdown-menu").toggleClass("show")
	}), $("body").trigger("resize");
	var n = $(window);
	// n.on("load", function() {
	//     var o = n.scrollTop(),
	//         e = $(".topbar");
	//     o > 100 ? e.addClass("fixed-header animated slideInDown") : e.removeClass("fixed-header animated slideInDown")
	// }), $(window).scroll(function() {
	//     $(window).scrollTop() >= 200 ? ($(".topbar").addClass("fixed-header animated slideInDown"), $(".bt-top").addClass("visible")) : ($(".topbar").removeClass("fixed-header animated slideInDown"), $(".bt-top").removeClass("visible"))
	// }), AOS.init(), $(".bt-top").on("click", function(o) {
	//     o.preventDefault(), $("html,body").animate({
	//         scrollTop: 0
	//     }, 700)
	// })
	$('.showhActive').click(function () {
		$(this).removeClass('showhActive');
		$(".drawer").removeClass('show');
		$(this).addClass('drawer-toggle');
		// alert('tes');
	});
	$('.drawer-toggle').click(function () {
		$(this).addClass('showhActive');
		$(".drawer").addClass('show');
		$(this).removeClass('drawer-toggle');
	});

	// Add Pricing
	function newMenuItem() {
		var newElem = $('tr.pricing-list-item.pattern').first().clone();
		newElem.find('input').val('');
		newElem.appendTo('table#price-list-wrap');
	}
	if ($("table#price-list-wrap").is('*')) {
		$('.add-pr-item-btn').on('click', function (e) {
			e.preventDefault();
			newMenuItem();
		});
		$(document).on("click", "#price-list-wrap .delete", function (e) {
			e.preventDefault();
			$(this).parent().parent().remove();
		});
		$('.add-cat-btn').on('click', function (e) {
			e.preventDefault();
			var newElem = $('' +
				'<tr class="pricing-list-item pricing-submenu">' +
				'<td>' +
				'<div class="box-move"><i class="ti-move"></i></div>' +
				'<div class="box-input"><input type="text" class="frm-control" placeholder="Category Title" /></div>' +
				'<div class="box-close"><a class="delete" href="#"><i class="ti-close"></i></a></div>' +
				'</td>' +
				'</tr>');
			newElem.appendTo('table#price-list-wrap');
		});
		$('table#price-list-wrap tbody').sortable({
			forcePlaceholderSize: true,
			forceHelperSize: false,
			placeholder: 'sortableHelper',
			zIndex: 999990,
			opacity: 0.6,
			tolerance: "pointer",
			start: function (e, ui) {
				ui.placeholder.height(ui.helper.outerHeight());
			}
		});
	}
	var fieldUnit = $('.pr-price').children('input').attr('data-unit');
	$('.pr-price').children('input').before('<i class="data-unit">' + fieldUnit + '</i>');
	$("a.close").removeAttr("href").on('click', function () {
		function slideFade(elem) {
			var fadeOut = {
				opacity: 0,
				transition: 'opacity 0.5s'
			};
			elem.css(fadeOut).slideUp();
		}
		slideFade($(this).parent());
	});
	$(".price-add-wrapper").each(function () {
		var switcherSection = $(this);
		var switcherInput = $(this).find('.switch input');
		if (switcherInput.is(':checked')) {
			$(switcherSection).addClass('switch-on');
		}
		switcherInput.change(function () {
			if (this.checked === true) {
				$(switcherSection).addClass('switch-on');
			} else {
				$(switcherSection).removeClass('switch-on');
			}
		});
	});

	// All Select Category
	$('#category').select2({
		placeholder: "What are you looking for ...",
		allowClear: true
	});

	$('#area').select2({
		placeholder: "Choose Area",
		allowClear: true
	});

	$('#minbed').select2({
		placeholder: "Min Bed",
		allowClear: true
	});

	$('#minbath').select2({
		placeholder: "Min Bath",
		allowClear: true
	});

	$('#author').select2({
		placeholder: "Choose Author...",
		allowClear: true
	});


	// Testimonials
	$("#testimonials").owlCarousel({
		nav: !0,
		dots: !0,
		items: 1,
		center: !0,
		loop: !0,
		navText: ['<i class="fa fa-arrow-left"></i>', '<i class="fa fa-arrow-right"></i>'],
		responsive: {
			1700: {
				stagePadding: 620,
				margin: 120
			},
			1430: {
				stagePadding: 320,
				margin: 100
			},
			1025: {
				stagePadding: 300,
				margin: 80
			},
			768: {
				stagePadding: 150,
				margin: 50
			},
			0: {
				stagePadding: 0,
				margin: 0
			}
		}
	})

	// Testimonials 2
	$("#testimonials-2").owlCarousel({
		nav: !0,
		dots: !0,
		items: 1,
		center: !0,
		loop: !0,
		navText: ['<i class="fa fa-arrow-left"></i>', '<i class="fa fa-arrow-right"></i>'],
		responsive: {
			1700: {
				stagePadding: 620,
				margin: 120
			},
			1430: {
				stagePadding: 320,
				margin: 100
			},
			1025: {
				stagePadding: 280,
				margin: 10
			},
			768: {
				stagePadding: 150,
				margin: 50
			},
			0: {
				stagePadding: 0,
				margin: 0
			}
		}
	})

	// Company Brand
	$("#company-brand").owlCarousel({
		loop: true,
		autoplay: true,
		nav: false,
		dots: false,
		margin: 60,
		responsiveClass: true,
		responsive: {
			0: {
				items: 1,
				nav: false
			},
			600: {
				items: 3,
				nav: false
			},
			1000: {
				items: 6,
				nav: false,
				loop: false
			}
		}
	})


	// List Slide
	$('#list-slide').owlCarousel({
		loop: true,
		margin: 15,
		responsiveClass: true,
		responsive: {
			0: {
				items: 1,
				autoplay: true,
				nav: true
			},
			600: {
				items: 2,
				autoplay: true,
				nav: false
			},
			1000: {
				items: 3,
				nav: false,
				autoplay: true,
				loop: false
			},
			1280: {
				items: 3,
				nav: false,
				autoplay: true,
				loop: false
			}
		}
	})

	/*------ Testimonial 3 Script ----*/
	$('.slick-carousel-3').slick({
		slidesToShow: 1,
		responsive: [
			{
				breakpoint: 768,
				settings: {
					arrows: false,
					centerPadding: '40px',
					slidesToShow: 1
				}
			},
			{
				breakpoint: 480,
				settings: {
					arrows: false,
					centerPadding: '40px',
					slidesToShow: 1
				}
			}
		]
	});

	// Destination Slide
	$('#destination-slide').owlCarousel({
		loop: true,
		margin: 15,
		responsiveClass: true,
		responsive: {
			0: {
				items: 1,
				autoplay: true,
				nav: true
			},
			600: {
				items: 2,
				autoplay: true,
				nav: false
			},
			1000: {
				items: 3,
				nav: false,
				autoplay: true,
				loop: false
			},
			1280: {
				items: 3,
				nav: false,
				autoplay: true,
				loop: false
			}
		}
	})

	// Category Slide
	$('#category-slide').owlCarousel({
		loop: true,
		margin: 15,
		responsiveClass: true,
		responsive: {
			0: {
				items: 1,
				autoplay: true,
				nav: true
			},
			600: {
				items: 2,
				autoplay: true,
				nav: false
			},
			1000: {
				items: 3,
				nav: false,
				autoplay: true,
				loop: false
			},
			1280: {
				items: 3,
				nav: false,
				autoplay: true,
				loop: false
			}
		}
	})

	// Range Slider Script
	$("#qua").slider({});
	$("#ser").slider({});
	$("#pri").slider({});
	$("#spa").slider({});
	$("#loc").slider({});
	$("#ex6").slider({});

});

const accordionItem = document.querySelectorAll('.accordion-item');

const onClickAccordionHeader = e => {
	if (e.currentTarget.parentNode.classList.contains('active')) {
		e.currentTarget.parentNode.classList.remove("active");
	} else {
		Array.prototype.forEach.call(accordionItem, (e) => {
			e.classList.remove('active');
		});
		e.currentTarget.parentNode.classList.add("active");
	}
};

const init = () => {
	Array.prototype.forEach.call(accordionItem, (e) => {
		e.querySelector('.accordion-header').addEventListener('click', onClickAccordionHeader, false);
	});
};

document.addEventListener('DOMContentLoaded', init);


class Steps {
	constructor(wizard) {
		this.wizard = wizard;
		this.steps = this.getSteps();
		this.stepsQuantity = this.getStepsQuantity();
		this.currentStep = 0;
	}

	setCurrentStep(currentStep) {
		this.currentStep = currentStep;
	}

	getSteps() {
		return this.wizard.getElementsByClassName('step');
	}

	getStepsQuantity() {
		return this.getSteps().length;
	}

	handleConcludeStep() {
		this.steps[this.currentStep].classList.add('-completed');
	}

	handleStepsClasses(movement) {
		if (movement > 0)
			this.steps[this.currentStep - 1].classList.add('-completed');
		else if (movement < 0)
			this.steps[this.currentStep].classList.remove('-completed');
	}
}

class Panels {
	constructor(wizard) {
		if (wizard !=null) {
			this.wizard = wizard;
			this.panelWidth = this.wizard.offsetWidth;
			this.panelsContainer = this.getPanelsContainer();
			this.panels = this.getPanels();
			this.currentStep = 0;

			this.updatePanelsPosition(this.currentStep);
			this.updatePanelsContainerHeight();
		}

	}

	getCurrentPanelHeight() {
		return `${this.getPanels()[this.currentStep].offsetHeight}px`;
	}

	getPanelsContainer() {
		return this.wizard.querySelector('.panels');
	}

	getPanels() {
		return this.wizard.getElementsByClassName('panel');
	}

	updatePanelsContainerHeight() {
		this.panelsContainer.style.height = this.getCurrentPanelHeight();
	}

	updatePanelsPosition(currentStep) {
		const panels = this.panels;
		const panelWidth = this.panelWidth;

		for (let i = 0; i < panels.length; i++) {
			panels[i].classList.remove(
				'movingIn',
				'movingOutBackward',
				'movingOutFoward'
			);

			if (i !== currentStep) {
				if (i < currentStep) panels[i].classList.add('movingOutBackward');
				else if (i > currentStep) panels[i].classList.add('movingOutFoward');
			} else {
				panels[i].classList.add('movingIn');
			}
		}

		this.updatePanelsContainerHeight();
	}

	setCurrentStep(currentStep) {
		this.currentStep = currentStep;
		this.updatePanelsPosition(currentStep);
	}
}

class Wizard {
	constructor(obj) {
		this.wizard = obj;
		this.panels = new Panels(this.wizard);
		this.steps = new Steps(this.wizard);
		this.stepsQuantity = this.steps.getStepsQuantity();
		this.currentStep = this.steps.currentStep;

		this.concludeControlMoveStepMethod = this.steps.handleConcludeStep.bind(this.steps);
		this.wizardConclusionMethod = this.handleWizardConclusion.bind(this);
	}

	updateButtonsStatus() {
		if (this.currentStep === 0)
			this.previousControl.classList.add('disabled');
		else
			this.previousControl.classList.remove('disabled');
	}

	updtadeCurrentStep(movement) {
		this.currentStep += movement;
		this.steps.setCurrentStep(this.currentStep);
		this.panels.setCurrentStep(this.currentStep);

		this.handleNextStepButton();
		this.updateButtonsStatus();
	}

	handleNextStepButton() {
		if (this.currentStep === this.stepsQuantity - 1) {
			this.nextControl.innerHTML = 'Conclude!';

			this.nextControl.removeEventListener('click', this.nextControlMoveStepMethod);
			this.nextControl.addEventListener('click', this.concludeControlMoveStepMethod);
			this.nextControl.addEventListener('click', this.wizardConclusionMethod);
		} else {
			this.nextControl.innerHTML = 'Next';

			this.nextControl.addEventListener('click', this.nextControlMoveStepMethod);
			this.nextControl.removeEventListener('click', this.concludeControlMoveStepMethod);
			this.nextControl.removeEventListener('click', this.wizardConclusionMethod);
		}
	}

	handleWizardConclusion() {
		this.wizard.classList.add('completed');
	};

	addControls(previousControl, nextControl) {
		this.previousControl = previousControl;
		this.nextControl = nextControl;
		this.previousControlMoveStepMethod = this.moveStep.bind(this, -1);
		this.nextControlMoveStepMethod = this.moveStep.bind(this, 1);

		previousControl.addEventListener('click', this.previousControlMoveStepMethod);
		nextControl.addEventListener('click', this.nextControlMoveStepMethod);

		this.updateButtonsStatus();
	}

	moveStep(movement) {
		if (this.validateMovement(movement)) {
			this.updtadeCurrentStep(movement);
			this.steps.handleStepsClasses(movement);
		} else {
			throw ('This was an invalid movement');
		}
	}

	validateMovement(movement) {
		const fowardMov = movement > 0 && this.currentStep < this.stepsQuantity - 1;
		const backMov = movement < 0 && this.currentStep > 0;

		return fowardMov || backMov;
	}
}

let wizardElement = document.getElementById('wizard');
let wizard = new Wizard(wizardElement);
let buttonNext = document.querySelector('.next');
let buttonPrevious = document.querySelector('.previous');

wizard.addControls(buttonPrevious, buttonNext);
