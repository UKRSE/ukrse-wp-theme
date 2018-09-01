<?php
/**
 * Theme Footer Section for our theme.
 * 
 * Displays all of the footer section and closing of the #page div.
 *
 * @package ThemeGrill
 * @subpackage Masonic
 * @since 1.0
 */
?>

</div><!-- #page -->
<footer class="footer-background">
   <div class="footer-content wrapper clear">
      <div class="clear">
         <?php if (is_active_sidebar('footer-sidebar-one')) { ?>
            <div class="tg-one-third">
               <?php
               dynamic_sidebar('footer-sidebar-one');
               ?>
            </div>
         <?php } ?>
         <?php if (is_active_sidebar('footer-sidebar-two')) { ?>
            <div class="tg-one-third">
               <?php
               dynamic_sidebar('footer-sidebar-two');
               ?>
            </div>
         <?php } ?>
         <?php if (is_active_sidebar('footer-sidebar-three')) { ?>
            <div class="tg-one-third last">
               <?php
               dynamic_sidebar('footer-sidebar-three');
               ?>
            </div>
         <?php } ?>
      </div>
      <div class="copyright clear">
         <p class="license">Content on this site is licensed under a <a target="_blank" href="https://creativecommons.org/licenses/by/4.0/">Creative Commons Attribution 4.0 International License <?php _e('&copy; ', 'masonic');echo date('Y'); ?></a></p>
         <?php masonic_footer_copyright(); ?>
      </div>
   </div>
   <div class="angled-background"></div>
</footer>

<?php wp_footer(); ?>

<?php if (get_current_blog_id() == 3):?>
<div class="modal-bg"></div>
<div class="content-modal">
    <div class="content-modal-inner">
        <h2></h2>
        <h3></h3>
        <div class="text-content"></div>
    </div>
    <div class="content-modal-close">
        <i class="fa fa-times" aria-hidden="true"></i>
    </div>
</div>

<script>


jQuery(document).ready(function () {

var contentLoaded = false;
var abstracts = {};
var currentId = null;


function loadContent() {

  // Call talk and workshop abstract pages

  jQuery.when(jQuery.get("https://rse.ac.uk/conf2018/talk-abstracts/"), jQuery.get("https://rse.ac.uk/conf2018/workshop-abstracts/")).done(function (t, w) {

    data = [t[0], w[0]]

    data.forEach(function (d) {
      var page = jQuery(d);
      var article = page.find("article.type-page")
      var talks = article.find("details")


      talks.each(function (index, talk) {

        var talkData = {
          "title": "",
          "author": "",
          "affiliation": "",
          "abstract": "",
          "image": {}
        }

        talkData.title = jQuery(talk).find("summary strong").text().trim()
        talkData.slug = jQuery(talk).attr("id")

        talkData.author = jQuery(talk).find("summary em").html().trim()
        talkData.image = jQuery(talk).find("img").length > 0 ? {
          "src": jQuery(talk).find("img")[0].src,
          "content": jQuery(talk).find("img")[0].outerHTML
        } : null
        talkData.affiliation = jQuery(talk).find("summary > em").length > 1 ? jQuery(talk).find("summary em").eq(1).html().trim() : "";
        talkData.abstract = jQuery(talk).find("blockquote").html()

        abstracts[talkData.slug] = talkData


      })
    })

    if (currentId) {
      $modalContent.html(abstracts[currentId].abstract)
      showModal();
    }

    contentLoaded = true;


  })

}

$modalBg = jQuery(".modal-bg");
$modal = jQuery(".content-modal");

$modal.find(".content-modal-close").add($modalBg).on("click", function () {
  hideModal()
})

$modalTitle = $modal.find(".content-modal-inner h2")
$modalAuthors = $modal.find(".content-modal-inner h3")
$modalContent = $modal.find(".content-modal-inner .text-content")

hideModal = function () {
  $modal.hide()
  $modalBg.hide()
}

showModal = function () {
  $modal.show()
  $modalBg.show()
}

$talkLinks = jQuery("[href^='/conf2018/talk-abstracts']");
$workshopLinks = jQuery("[href^='/conf2018/workshop-abstracts']");

$talkLinks.add($workshopLinks).on("click", function (e) {
  e.preventDefault();

  currentId = e.target.href.split("#")[1];

  if (contentLoaded !== true) {
    $modalTitle.text(jQuery(e.target).text())
    $modalContent.html("Loading...")
    showModal();
    loadContent();
  } else {
    
    $modalContent.html(abstracts[currentId].abstract)
    showModal();
  }
  
})

})




</script>

<?php endif; ?>

</body>
</html>
