// Rollup plugins
import babel from 'rollup-plugin-babel';
import eslint from 'rollup-plugin-eslint';
import resolve from 'rollup-plugin-node-resolve';
import commonjs from 'rollup-plugin-commonjs';
import uglify from 'rollup-plugin-uglify';
import postcss from 'rollup-plugin-postcss';

// PostCSS plugins
import simplevars from 'postcss-simple-vars';
import nested from 'postcss-nested';
import cssnext from 'postcss-cssnext';
import cssnano from 'cssnano';

/* 
 * @license    https://opensource.org/licenses/BSD-3-Clause New BSD License
 * @copyright  (c) 2017-2018, jailgreen jukka@jahlgren.eu
 */

export default {
  input: 'resources/js/main.js',
  output: {
    file: 'public/js/main.min.js',
    format: 'iife',
    name: 'App',
    sourcemap: 'inline',
    globals: {
      jquery: 'jQuery'
    }
  },
  plugins: [
    postcss({
      plugins: [
        simplevars(),
        nested(),
        cssnext({ warnForDuplicates: false }),
        // cssnano(),
      ],
      extensions: ['.css'],
    }),
    resolve({
      jsnext: true,
      main: true,
      browser: true,
    }),
    commonjs(),
    eslint({
      exclude: [
        'resources/scss/**',
      ]
    }),
    babel({
      exclude: 'node_modules/**',
    }),
    // uglify(),
  ],
  external: [
    'jquery'
  ],
}
