/**
 * @license Copyright (c) 2003-2013, CKSource - Frederico Knabben. All rights reserved.
 * For licensing, see LICENSE.html or http://ckeditor.com/license
 */

CKEDITOR.editorConfig = function( config ) {
	// Define changes to default configuration here. For example:
	// config.language = 'fr';
//	 config.uiColor = '#AADC6E';
         config.extraPlugins = 'wpmore'; 
//         config.extraPlugins = 'wpmore,imagebrowser'; 
//         config.imageBrowser_listUrl= "/upload";
         config.toolbar = [
            ['WPMore'] // Add 'WPMore' button to toolbar
          ];
};
