
<form action="#" method="POST" enctype="multipart/form-data">
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Modal Title</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <!-- Modal content goes here -->
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <!-- Additional buttons or actions can be added here -->
                </div>
            </div>
        </div>
    </div>
</form>
<script>
    // Wrap your script inside the document ready function to ensure the DOM is fully loaded
    $(document).ready(function () {
        // Function to open the Avalie modal
        function openAvalieModal() {
            $('#exampleModal').modal('show');
        }

        // Attach a click event listener to the "Avalie" button
        $('#openAvalieModal').on('click', function () {
            openAvalieModal(); // Call the function to open the Avalie modal
        });
    });
</script>