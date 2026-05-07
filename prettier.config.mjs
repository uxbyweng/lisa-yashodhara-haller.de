/** @type {import("prettier").Config} */
const config = {
    useTabs: false,
    tabWidth: 4,
    endOfLine: "lf",
    semi: true,
    singleQuote: false,
    trailingComma: "es5",
    plugins: ["@prettier/plugin-php"],
};

export default config;
