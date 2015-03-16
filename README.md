modx-react
===========

React server side rendering for MODX Revo

## Main goal
Allow to render markup based on [React](https://github.com/facebook/react) on server.

## Dependencies
This module needs [node-react](https://github.com/proxyfabio/node-react) module to work properly.

## Run
1. First of all you have to install `modx-react` via package manager
2. There is `modxreact.assets` option at module config. It's the path to you public assets.
Cause i'm usually use `modxsite` for work the path is relative to it. But you can manage by your own
3. React don't like foreign whitespace at the markup. If you are using `modxSmarty` that [`template controller`](https://github.com/proxyfabio/modx-react/blob/master/core/components/modxreact/controllers/smarty/base.php) will help
4. Run `node-react` at you server
5. Now you can render your React components via [`snippet`](https://github.com/proxyfabio/modx-react/tree/master/examples/basic-example/template.tpl#L7)
