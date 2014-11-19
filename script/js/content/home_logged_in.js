
var breedList = {

    selectedItem:  null,

    onReady: function() {
        $(".list_item").click(breedList.itemIsClicked);
    },

    itemIsClicked: function() {
        var clickedItem = $(this);
        var clickedItemId = clickedItem.attr('id');

        if(breedList.selectedItem != clickedItemId) {
            if (breedList.selectedItem != null) {
                $("#" +  breedList.selectedItem + ".list_item").removeClass("selected");
            }
            clickedItem.addClass("selected");

            $(".selected_breed_head").html(clickedItem.html());
            breedList.selectedItem =  clickedItemId;
        }
    }

};

$( document ).ready( breedList.onReady );
