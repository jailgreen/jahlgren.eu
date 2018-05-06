/* 
 * @license    https://opensource.org/licenses/BSD-3-Clause New BSD License
 * @copyright  (c) 2017-2018, jailgreen jukka@jahlgren.eu
 */

export default {
    input: 'resources/js/main.js',
    external: ['jquery'],
    output: {
      file: 'data/build/js/bundle.js',
      format: 'es',
      sourcemap: true
    }
}
