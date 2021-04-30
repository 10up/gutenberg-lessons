// import foo from './components/bar';
import { Navigation } from '@10up/component-navigation';

// Adds class to parent item when ul opened/closed
const toggleNavigation = (direction = 'close') => {
	const nav = document.querySelector('.site-navigation');

	if (!nav) {
		return;
	}

	if (direction !== 'close') {
		nav.classList.add('nav-opened');
		return;
	}

	nav.classList.remove('nav-opened');
};

new Navigation('.primary-nav', {
	onOpen: () => {
		toggleNavigation('open');
	},
	onClose: () => {
		toggleNavigation('close');
	},
});
