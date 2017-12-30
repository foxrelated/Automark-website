/*
 * Very simple jQuery Color Picker
 * https://github.com/tkrotoff/jquery-simplecolorpicker
 *
 * Copyright (C) 2012-2013 Tanguy Krotoff <tkrotoff@gmail.com>
 *
 * Licensed under the MIT license
 */

/**
 * Inspired by Bootstrap Twitter.
 * See https://github.com/twitter/bootstrap/blob/master/less/dropdowns.less
 * See http://twitter.github.com/bootstrap/assets/css/bootstrap.css
 */

.simplecolorpicker.picker:before {
  position: absolute;
  top: -7px;
  left: 9px;
  display: inline-block;
  border-right: 7px solid transparent;
  border-bottom: 7px solid #ccc;
  border-left: 7px solid transparent;
  border-bottom-color: rgba(0, 0, 0, 0.2);
  content: '';
}

.simplecolorpicker.picker:after {
  position: absolute;
  top: -6px;
  left: 10px;
  display: inline-block;
  border-right: 6px solid transparent;
  border-bottom: 6px solid #ffffff;
  border-left: 6px solid transparent;
  content: '';
}

.simplecolorpicker.picker {
  position: absolute;
  top: 100%;
  left: 0;
  z-index: 1051; /* Above Bootstrap modal (z-index of 1050) */
  display: none;
  float: left;

  min-width: 160px;
  max-width: 264px;

  padding: 4px 0 0 4px;
  margin: 1px 0 0;
  list-style: none;
  background-color: #ffffff;

  border: 1px solid #ccc;
  border: 1px solid rgba(0, 0, 0, 0.2);

  *border-right-width: 2px;
  *border-bottom-width: 2px;

  -webkit-border-radius: 5px;
     -moz-border-radius: 5px;
          border-radius: 5px;

  -webkit-box-shadow: 0 5px 10px rgba(0, 0, 0, 0.2);
     -moz-box-shadow: 0 5px 10px rgba(0, 0, 0, 0.2);
          box-shadow: 0 5px 10px rgba(0, 0, 0, 0.2);

  -webkit-background-clip: padding-box;
     -moz-background-clip: padding;
          background-clip: padding-box;
}

  .simplecolorpicker.inline {
    display: inline-block;
    height: 18px;
    padding: 4px 0;
  }

  .simplecolorpicker.icon,
  .simplecolorpicker span {
    cursor: pointer;
    display: inline-block;

    -webkit-border-radius: 3px;
       -moz-border-radius: 3px;
            border-radius: 3px;

    border: 1px solid transparent;
  }
  .simplecolorpicker span {
    margin: 0 4px 4px 0;
  }

  .simplecolorpicker span:hover,
  .simplecolorpicker span.selected {
    border: 1px solid black;
  }
