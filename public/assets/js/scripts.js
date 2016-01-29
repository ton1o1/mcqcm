$(function() {

    $("#skillSearch").select2({
        language: "fr",
        placeholder: "Saisir une compétence...",
        multiple: true,
        ajax: {
            method: "POST",
          url: "http://mcqcm.dev/skill/search",
          dataType: "json",
          delay: 250,
          data: function (params) {
            return {
              q: params.term, // search term
              page: params.page,
              source: 'homepage'
            };
          },
          processResults: function (data, params) {
            // parse the results into the format expected by Select2
            // since we are using custom formatting functions we do not need to
            // alter the remote JSON data, except to indicate that infinite
            // scrolling can be used
            params.page = params.page || 1;

            return {
              results: data,
              pagination: {
                more: (params.page * 30) < data.total_count
              }
            };
          },
          cache: true
        },
        escapeMarkup: function (markup) {
          return markup; // let our custom formatter work
        },
        minimumInputLength: 2,
        templateResult: function(skill) {
          return skill.tag;
        },
        templateSelection: function(skill) {
          return skill.tag;
        }
    });

    $("#skillSearchAdd").select2({
        language: "fr",
        placeholder: "Saisir un ou plusieurs mots clés de compétences.",
        multiple: true,
        ajax: {
            method: "POST",
          url: "http://mcqcm.dev/skill/search",
          dataType: "json",
          delay: 250,
          data: function (params) {
            return {
              q: params.term, // search term
              page: params.page,
              source: 'creator'
            };
          },
          processResults: function (data, params) {
            // parse the results into the format expected by Select2
            // since we are using custom formatting functions we do not need to
            // alter the remote JSON data, except to indicate that infinite
            // scrolling can be used
            params.page = params.page || 1;

            return {
              results: data,
              pagination: {
                more: (params.page * 30) < data.total_count
              }
            };
          },
          cache: true
        },
        escapeMarkup: function (markup) {
          return markup; // let our custom formatter work
        },
        minimumInputLength: 2,
        templateResult: function(skill) {
          return skill.tag;
        },
        templateSelection: function(skill) {
          return skill.tag;
        }
    });

});