module.exports = {
  env: {
    browser: true,
    es2021: true,
  },
  extends: ["eslint:recommended", "plugin:vue/vue3-recommended", "prettier"],
  overrides: [],
  parserOptions: {
    ecmaVersion: "latest",
    sourceType: "module",
  },
  rules: {
    "vue/multi-word-component-names": "off",
    "vue/no-v-html": "off",
  },
  globals: {
    route: true,
    module: true,
    __dirname: true,
    axios: true,
    _: true,
    Echo: true,
  },
  ignorePatterns: ["resources/js/ziggy.js"],
};
