<!-- Create Modal -->
<div class="modal fade" id="createModal" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document"> {{-- change modal-lg to modal-sm or remove for default --}}
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="title">Create New Item</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>

            <div class="modal-body">
                {{-- Example: Form inside modal --}}
                <form method="POST" action="{{ route('tags.store') }}">
                    @csrf
                    <div class="form-group">
                        <label for="name">Item Name</label>
                        <input type="text" name="name" class="form-control" id="name" required>
                    </div>

                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary">Save Item</button>
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>