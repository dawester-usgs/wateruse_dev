/*!
 * d3bar
 * @author Alexe Dacurro
 * @version 0.1
 * @date September 19, 2016
 * @repo http://github.com/lexdacurro
 */

(function(root, factory) {
  if (typeof define === 'function' && define.amd) {
    // AMD. Register as an anonymous module
    define([], factory);
  } else if (typeof exports === 'object') {
    // Node. Does not work with strict CommonJS, but only CommonJS-like environments that support module.exports,
    // like Node
    module.exports = factory();
  } else {
    // browser globals (root is window)
    root.d3pie = factory(root);
  }
}(this, function() {
	var scriptname = "d3bar";
	var version = "0.1";
	
	var _uniqueID = 0;
	
	
	/** constructor **/



}));