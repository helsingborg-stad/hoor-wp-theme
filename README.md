# hoor.se Wordpress theme

<img alt="Höör kommuns logo" src="https://www.hoor.se/wp-content/uploads/default-meta-image.png" width="300" />

This is the Wordpress theme used at [www.hoor.se](https://www.hoor.se), the official site of Höörs kommun. It's a child theme to [Municipio](http://github.com/helsingborg-stad/Municipio) by Helsingborg stad.

## Plugins

[Municipio Boilerplate](https://github.com/helsingborg-stad/Municipio-boilerplate) gives a good overview of plugins that this theme styles and customizes, most notably [Modularity](https://github.com/helsingborg-stad/Modularity).

## Principles

As much as possible this theme tries to be a good citizen in the ecosystem created by Helsingborg stad. This means that where possible improvements are contributed to e.g Municipio instead of overridden here. This is especially important for performance heavy things where double work should be avoided.

The big exception we do here is that a customized version of [styleguide-web](https://github.com/helsingborg-stad/styleguide-web) is bundled in this theme. This is to be able to have more control over styling.

## Code style and naming conventions

As much as possible this theme follows the code style and naming conventions of Municipio. E.g if we override functionality the same file name and PHP class name is used as in Municipio.

CSS is a sort of a mixed bag at the moment. We inherit some classes and styles from the bundled [styleguide-web](https://github.com/helsingborg-stad/styleguide-web), but [itcss](http://itcss.io9) is used as CSS architecture for styles from this theme.

## Building assets

To build assets:

```
yarn install
yarn run build
```

[Yarn](https://yarnpkg.com) is used to achieve deterministic builds. See `gulpfile.js` for different tasks, e.g `gulp watch`.

## Cache busting

For performance reasons assets are set to [never expire](http://developer.yahoo.com/performance/rules.html#expires). During build all assets gets a hash appended to their file name: main.min.css → main.min-5d9ecac9a1.css. Assets used in the CSS are automatically handled. _Don't link to assets in JavaScript_, instead style using class names. In PHP a helper function is used to get the corrects asset filename: `\Hoor\Helper\CacheBust::name('css/main.min.css')`.

## Customizing Municipio

This theme does quite heavy customizations of Municipio. Do we recommend it? Time will tell, but up until now we have been able to use new versions of Municipio and Modularity without too much work.
