$(function() {

  // Homepage skills search
    $("#skillSearch").select2({
        theme: "bootstrap",
        language: "fr",
        placeholder: "Saisir une compétence...",
        multiple: true,
        ajax: {
            method: "POST",
          url: urlSkillSearch,
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
              results: data.results,
              pagination: {
                more: (params.page * 30) < data.total
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
          if(skill.tag){
            return skill.tag;
          }
          else{
            return skill.text;
          }
        }
    });
  
  // Quiz creator skills search
    $("#skillSearchAdd").select2({
        theme: "bootstrap",
        language: "fr",
        placeholder: "Saisir un ou plusieurs mots clés de compétences.",
        multiple: true,
        ajax: {
            method: "POST",
          url: urlSkillSearch,
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
              results: data.results,
              pagination: {
                more: (params.page * 30) < data.total
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
          if(skill.new){
            return "Aucun résultat pour le tag exact \"" + skill.tag + "\", cliquez pour le créer";
            }
            else{
            return skill.tag;
            }
        },
        templateSelection: function(skill) {
          if(skill.tag){
            return skill.tag;
          }
          else{
            return skill.text;
          }
        }
    });

// Homepage pagination
$(".page-nav").on("click", function(){
        
        // Get page selection
        var page = $(this).data("page");

        $("input[name=page]").val(page);
        $("form[name=search]").submit();
    });

});