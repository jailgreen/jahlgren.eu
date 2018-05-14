/* 
 * @license    https://opensource.org/licenses/BSD-3-Clause New BSD License
 * @copyright  (c) 2017-2018, jailgreen jukka@jahlgren.eu
 */

module.exports = ctx => ({
  parser: 'postcss-scss',
  plugins: [
    require('postcss-node-sass')({
      includePaths: ['node_modules/'],
      outputStyle: 'nested'
    }),

    require('postcss-cssnext')({ warnForDuplicates: false }),
    (ctx.env === 'production' && require('cssnano'))
  ]
});
