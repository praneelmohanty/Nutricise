history.scrollRestoration = "manual";
const removeAnchorFormURL = () => {
  setTimeout(() => {
    window.history.replaceState({}, "", window.location.href.split("#")[0]);
  }, 100);
};