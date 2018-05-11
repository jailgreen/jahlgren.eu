// Rollup plugins
import babel from 'rollup-plugin-babel';
import eslint from 'rollup-plugin-eslint';
import resolve from 'rollup-plugin-node-resolve';
import uglify from 'rollup-plugin-uglify';
import postcss from 'rollup-plugin-postcss';

// PostCSS plugins
import stylelint from 'stylelint';
import simplevars from 'postcss-simple-vars';
import nested from 'postcss-nested';
import cssnext from 'postcss-cssnext';
import cssnano from 'cssnano';

/* 
 * @license    https://opensource.org/licenses/BSD-3-Clause New BSD License
 * @copyright  (c) 2017-2018, jailgreen jukka@jahlgren.eu
 */
const BUNDLE = process.env.BUNDLE === 'true'

export default {
  input: 'resources/js/main.js',
  output: {
    file: 'public/js/main.min.js',
    format: 'iife',
    name: 'App',
    sourcemap: 'true',
    globals: {
      jquery: 'jQuery'
    }
  },
  plugins: [
    postcss({
      plugins: [
        stylelint(),
        simplevars(),
        nested(),
        cssnext({ warnForDuplicates: false }),
        cssnano(),
      ],
      extensions: ['.css', '.scss'],
    }),
    resolve(),
    eslint({
      exclude: [
        'resources/scss/**',
      ]
    }),
    babel({
      exclude: 'node_modules/**',
    }),
    uglify(),
  ],
  external: [
    'jquery'
  ],
}
