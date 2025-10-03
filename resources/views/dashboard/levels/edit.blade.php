<div class="modal fade" id="editModal{{ $loop->iteration }}" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="title">Edit Level</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <form method="POST" action="{{ route('levels.update', $level->slug) }}">
                    @csrf
                    @method('PUT')
                    <input type="hidden" name="id" id="edit_id">
                    <div class="form-group">
                        <label for="edit-name">Name</label>
                        <input type="text" name="name" class="form-control" id="edit-name" value="{{ $level->name }}">
                    </div>
                    <div class="form-group">
                        <label for="edit-description">Description</label>
                        <textarea name="description" class="form-control"
                            id="edit-description">{{$level->description }}</textarea>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary">Save Changes</button>
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>