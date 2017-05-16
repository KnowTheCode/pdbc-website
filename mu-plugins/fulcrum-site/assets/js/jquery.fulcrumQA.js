/**
 * Fulcrum QA (Question and Answer) plugin
 *
 * Question and Answer JavaScript handling.
 *
 * This script handles opening/closing of the questions and answers,
 * toggling of the icon handle, and setting of the class states.  It can be used for hints, FAQs, or any content
 * where you want to show a section and then hide away the content.  Clicking on the element will reveal the
 * hidden content (when it is hidden) or hide it (when showing).
 *
 * @package     KnowTheCode
 * @since       1.0.1
 * @author      hellofromTonya
 * @link        https://KnowTheCode.io
 * @license     GPL-2.0+
 */
;(function ($, window, document, undefined) {
    'use strict'

    $.fn.fulcrumQA = function(options) {
        var qa = $(this),
            defaults = {
                iconEl: '.qa--icon',
	            answerEl: '.qa--answer',
                iconClassname: {
                    open: '--is-open',
                    closed: '--is-closed'
                }
            };

        // Makes variables public
        qa.vars = $.extend({}, defaults, options);

        var namespace = qa.vars.namespace,
            methods = {},
            answers = qa.next(),
            icons = qa.find( qa.vars.iconEl );

        // Private methods
        methods = {
            init: function() {
                methods.clickHandler();
            },

            /**
             * Clicking on the question fires the click event.  This function then opens or closes the answer and changes the icon.
             *
             * @since 1.0.0
             */
            clickHandler: function() {
                qa.on( "click", function() {
                    var index = qa.index( this );

                    methods.toggleAnswer( index );
                });
            },

            /**
             * Toggle the answer open or close, as well as change the icon.
             *
             * @param int index
             */
            toggleAnswer: function( index ) {
                var $answer = methods.getAnswer( index ),
                    $icon = methods.getIcon( index );

                if ( methods.isAnswerShowing( $answer ) ) {
                    methods.closeAnswer( $answer, $icon );
                } else {
                    methods.openAnswer( $answer, $icon );
                }
            },

            /**
             * Open the answer.  Slides down the answer and changes the icon.
             *
             * @param obj $answer
             * @param obj $icon
             */
            openAnswer: function( $answer, $icon ) {
                $answer.slideDown(function(){
	                methods.changeHandleHTML($icon, 'closeHandle');

	                methods.changeIconClassname( $icon, true );
                });
            },

            /**
             * Close the answer. Slides up the answer and changes the icon.
             *
             * @param obj $answer
             * @param obj $icon
             */
            closeAnswer: function( $answer, $icon ) {
                $answer.slideUp(function(){
	                methods.changeHandleHTML($icon, 'openHandle');

	                methods.changeIconClassname( $icon, false );
                });
            },

            /**
             * Change the Icon's classname
             *
             * When opening, remove the --is-closed class and add the --is-open class.
             *
             * @param object $icon
             * @param bool isOpening
             */
            changeIconClassname: function( $icon, isOpening ) {
                isOpening = methods.setDefaultState( isOpening );

                var removeClassname = methods.getIconClassname( isOpening, false ),
                    addClassname = methods.getIconClassname( isOpening, true );

                $icon
                    .removeClass( removeClassname )
                    .addClass( addClassname );
            },

	        /**
	         * Change the icon's text by grabbing the data handle.
	         *
	         * @param object $icon
	         * @param string dataAttr
	         */
            changeHandleHTML: function( $icon, dataAttr ) {
                var handleText = $icon.data( dataAttr );

	            $icon.text( handleText );
            },

            /***********************
             * Getters and Setters
             **********************/

            /**
             * Fetches the answer element out of the array of elements.
             *
             * @param int index
             *
             * @returns element or undefined
             */
            getAnswer: function( index ) {
                if ( index in answers ) {
                    return $( answers[ index ] );
                }
            },

            /**
             * Fetches the icon element out of the array of elements.
             *
             * @param int index
             *
             * @returns element or undefined
             */
            getIcon: function( index ) {
                if ( index in icons ) {
                    return $( icons[ index ] );
                }
            },

            /**
             * Fetches the icon's classname for either an `addClass()` or `removeClass()` action.
             *
             *
             * @param bool isOpening Indicates if icon should be opening.
             * @param bool isAddClassAction Indicates if this is an `addClass()` action
             *
             * @returns {string}
             */
            getIconClassname: function( isOpening, isAddClassAction ) {
                isOpening = methods.setDefaultState( isOpening );
                isAddClassAction = methods.setDefaultState( isAddClassAction );

                var openIndex, closeIndex;

                if ( isAddClassAction ) {
	                openIndex = 'open';
	                closeIndex = 'closed';
                } else {
	                openIndex = 'closed';
	                closeIndex = 'open';
                }

                return isOpening
                    ? qa.vars.iconClassname[ openIndex ]
                    : qa.vars.iconClassname[ closeIndex ];
            },

            /**
             * Sets the default state for the variable, i.e. to ensure it is true or false (and not undefined).
             *
             * @param variable
             *
             * @returns {boolean}
             */
            setDefaultState: function ( variable ) {
                return variable == true ? true : false;
            },

            /***********************
             * State Checkers
             **********************/

            /**
             * Checks if the answer is to be closed.
             *
             * If the icon has a closed classname, then it returns true.
             *
             * @since 1.0.0
             *
             * @returns bool
             */
            isAnswerToBeClosed: function( index ) {
                if ( index in icons ) {
                    var icon = icons[ index ];

                    return $( icon ).hasClass( qa.vars.iconClassname.open );
                }

                return false;
            },

            isAnswerShowing: function( $answer ) {
                return $answer.is(':visible');
            },

        } // end of private methods

        methods.init();

    } // end of qa object

})(jQuery, window, document);