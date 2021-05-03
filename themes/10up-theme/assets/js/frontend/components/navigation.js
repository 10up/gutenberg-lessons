/* eslint-disable no-unused-vars */
import { Navigation } from '@10up/component-navigation';

// Adds class to parent item when ul opened/closed
const siteNavigation = () => {
	const nav = document.querySelector('.site-navigation');

	if (!nav) {
		return;
	}

	new Navigation('.primary-nav');
};

siteNavigation();
