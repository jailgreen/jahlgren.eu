import $ from 'jquery';

// Import styles (automatically injected into <head>).
import '../scss/main.scss';

// Import a couple modules for testing.
import { sayHelloTo } from './modules/mod1';
import addArray from './modules/mod2';

/* 
 * @license    https://opensource.org/licenses/BSD-3-Clause New BSD License
 * @copyright  (c) 2017-2018, jailgreen jukka@jahlgren.eu
 */

// Run some functions from our imported modules.
const result1 = sayHelloTo('Jason');
const result2 = addArray([1, 2, 3, 4]);

/* 
 * Print the results on the page.
 * const printTarget = document.getElementsByClassName('debug__output')[0];
 * 
 */
const printTarget = $('.debug__output')[0];

printTarget.innerText += `sayHelloTo('Jason') => ${result1}\n\n`;
printTarget.innerText += `addArray([1, 2, 3, 4]) => ${result2}`;
