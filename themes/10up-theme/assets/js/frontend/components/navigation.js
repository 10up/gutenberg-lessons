/* eslint-disable no-unused-vars */
import { Navigation } from '@10up/component-navigation';

// Adds class to parent item when ul opened/closed
const siteNavigation = () => {
	const nav = document.querySelector('.site-navigation');

	if (!nav) {
		return;
	}

	// eslint-disable-next-line no-new
	new Navigation('.primary-nav');
};

siteNavigation();
