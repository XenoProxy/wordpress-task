import{b as m,M as d,i as l,q as y,s as x}from"./helpers.CXsRrhc8.js";import{i as _,t as I}from"./toString.zLSwYOtv.js";var E=/\.|\[(?:[^[\]]*|(["'])(?:(?!\1)[^\\]|\\.)*?\1)\]/,C=/^\w*$/;function P(n,r){if(m(n))return!1;var t=typeof n;return t=="number"||t=="symbol"||t=="boolean"||n==null||_(n)?!0:C.test(n)||!E.test(n)||r!=null&&n in Object(r)}var A="Expected a function";function f(n,r){if(typeof n!="function"||r!=null&&typeof r!="function")throw new TypeError(A);var t=function(){var e=arguments,i=r?r.apply(this,e):e[0],s=t.cache;if(s.has(i))return s.get(i);var o=n.apply(this,e);return t.cache=s.set(i,o)||s,o};return t.cache=new(f.Cache||d),t}f.Cache=d;var z=500;function M(n){var r=f(n,function(e){return t.size===z&&t.clear(),e}),t=r.cache;return r}var T=/[^.[\]]+|\[(?:(-?\d+(?:\.\d+)?)|(["'])((?:(?!\2)[^\\]|\\.)*?)\2)\]|(?=(?:\.|\[\])(?:\.|\[\]|$))/g,N=/\\(\\)?/g,O=M(function(n){var r=[];return n.charCodeAt(0)===46&&r.push(""),n.replace(T,function(t,e,i,s){r.push(i?s.replace(N,"$1"):e||t)}),r});function g(n,r){return m(n)?n:P(n,r)?[n]:O(I(n))}var R=1/0;function h(n){if(typeof n=="string"||_(n))return n;var r=n+"";return r=="0"&&1/n==-R?"-0":r}function S(n,r){r=g(r,n);for(var t=0,e=r.length;n!=null&&t<e;)n=n[h(r[t++])];return t&&t==e?n:void 0}function $(n,r,t){var e=n==null?void 0:S(n,r);return e===void 0?t:e}function F(n,r,t,e){if(!l(n))return n;r=g(r,n);for(var i=-1,s=r.length,o=s-1,u=n;u!=null&&++i<s;){var a=h(r[i]),c=t;if(a==="__proto__"||a==="constructor"||a==="prototype")return n;if(i!=o){var p=u[a];c=void 0,c===void 0&&(c=l(p)?p:y(r[i+1])?[]:{})}x(u,a,c),u=u[a]}return n}export{F as a,S as b,g as c,$ as g,P as i,f as m,h as t};
