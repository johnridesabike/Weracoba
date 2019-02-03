var postcssFocusWithin = require('postcss-focus-within');

module.exports = {
    plugins: {
        autoprefixer: {}
    }
};

module.exports = {
    plugins: [
		postcssFocusWithin(/* pluginOptions */)
    ]
};
module.exports = {
    plugins: [
		require('autoprefixer')
    ]
};
