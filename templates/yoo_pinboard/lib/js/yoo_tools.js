/* Copyright (C) 2007 - 2009 YOOtheme GmbH */

var YOOTools = {
		
	start: function() {
		
		/* Match height of div tags */
		YOOTools.setDivHeight();

		/* Accordion menu */
		new YOOAccordionMenu('div#middle ul.menu li.toggler', 'ul.accordion', { accordion: 'slide' });

		/* Fancy menu */
		new YOOFancyMenu($E('ul', 'menu'), { mode: 'move', transition: Fx.Transitions.Expo.easeOut, duration: 700 });

		/* Dropdown menu */
		if(!window.ie6 && !window.ie7) { new YOODropdownMenu('div#menu li.parent', { mode: 'height', transition: Fx.Transitions.Expo.easeOut }); }

		/* Morph: main menu */
		var enterColor = '#c39600';
		var leaveColor = '#323232';
		
		var menuEnter = { 'color': enterColor };
		var menuLeave = { 'color': leaveColor };
		
		new YOOMorph('div#menu li.level1', menuEnter, menuLeave,
		{ transition: Fx.Transitions.linear, duration: 300 },
		{ transition: Fx.Transitions.sineIn, duration: 700 }, '.level1');
		
		/* Morph: level2 and deeper items of main menu (drop down) */
		new YOOMorph('div#menu ul.level2 a', menuEnter, menuLeave,
			{ transition: Fx.Transitions.expoOut, duration: 300},
			{ transition: Fx.Transitions.sineIn, duration: 500 });
		
		/* Morph: level1 subline of main menu */
		var enterColor = '#aa7800';
		var leaveColor = '#323232';
		
		var menuEnter = { 'color': enterColor };
		var menuLeave = { 'color': leaveColor };
		
		new YOOMorph('div#menu li.level1', menuEnter, menuLeave,
		{ transition: Fx.Transitions.linear, duration: 300 },
		{ transition: Fx.Transitions.sineIn, duration: 700 }, 'span.sub');
		
		 /* Morph: sub menu */
		var enterColor = '#d25028';
		var leaveColor = '#323232';
		
		var submenuEnter = { 'color': enterColor};
		var submenuLeave = { 'color': leaveColor};
		
		new YOOMorph('div#middle ul.menu a, div#middle ul.menu span.separator', submenuEnter, submenuLeave,
		{ transition: Fx.Transitions.expoOut, duration: 100},
		{ transition: Fx.Transitions.sineIn, duration: 700 });

		/* Smoothscroll */
		new SmoothScroll({ duration: 500, transition: Fx.Transitions.Expo.easeOut });
	},

	/* Include script */
	include: function(library) {
		$ES('script').each(function(s, i){
			var src  = s.getProperty('src');
			var path = '';
			if (src && src.match(/yoo_tools\.js(\?.*)?$/)) path = src.replace(/yoo_tools\.js(\?.*)?$/,'');
			if (src && src.match(/template\.js\.php(\?.*)?$/)) path = src.replace(/template\.js\.php(\?.*)?$/,'');
			if (path != '') document.write('<script language="javascript" src="' + path + library + '" type="text/javascript"></script>');
		});
	},

	/* Match height of div tags */
	setDivHeight: function() {
		YOOBase.matchDivHeight('div.topbox div.deepest', 0, 40);
		YOOBase.matchDivHeight('div.bottombox div.deepest', 0, 40);
		YOOBase.matchDivHeight('div.maintopbox div.deepest', 0, 40);
		YOOBase.matchDivHeight('div.mainbottombox div.deepest', 0, 40);
		YOOBase.matchDivHeight('div.contenttopbox div.deepest', 0, 40);
		YOOBase.matchDivHeight('div.contentbottombox div.deepest', 0, 40);
	}

};

/* Add functions on window load */
window.addEvent('domready', YOOTools.start);

/* Load IE6 fix */
if (window.ie6) {
	YOOTools.include('addons/ie6fix.js');
	YOOTools.include('addons/ie6png.js');
	YOOTools.include('yoo_ie6fix.js');
}
