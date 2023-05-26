'use strict';

const process = require( 'process' );

const colors = [
    'primary',
    'primary-light',
    'primary-dark',
    'secondary',
    'secondary-light',
    'secondary-dark',
    'light',
    'dark',
	'black',
	'white',
	'gray',
	'gray-dark',
    'gray-light',
];

module.exports = ( ctx ) => {
	return {
		map: {
			inline: false,
			annotation: true,
			sourcesContent: true,
		},
		plugins: {
			autoprefixer: {
				cascade: false,
				env: 'bs5',
			},
			'postcss-understrap-palette-generator': {
				colors: colors.map( ( x ) => `--${ 'bs-' }${ x }` ),
			},
		},
	};
};
