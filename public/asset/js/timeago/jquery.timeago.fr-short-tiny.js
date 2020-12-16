(function (factory) {
    if (typeof define === 'function' && define.amd) {
      define(['jquery'], factory);
    } else if (typeof module === 'object' && typeof module.exports === 'object') {
      factory(require('jquery'));
    } else {
      factory(jQuery);
    }
  }(function (jQuery) {
    // French shortened
    jQuery.timeago.settings.strings = {
       prefixAgo: "",
       prefixFromNow: "d'ici",
       seconds: "moins d'une minute",
       minute: "1 minute",
       minutes: "%d min",
       hour: "1 h",
       hours: "%d h",
       day: "1 j",
       days: "%d j",
       month: "1 mois",
       months: "%d mois",
       year: "1 an",
       years: "%d ans"
    };
  }));
  