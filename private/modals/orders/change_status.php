<!-- Modal -->
<div class="modal fade" id="change-order-status" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Change Order Status</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form onsubmit="newProduct(event)">
                <div class="modal-body">
                    <div>
                        <label for="change_status" class="form-label">Change Status</label>
                        <select id="change_status" class="form-select" required>
                            <option value="" selected>Select Status</option>
                            <option value="Submitted">Submitted</option>
                            <option value="In transit">In transit</option>
                            <option value="Delivered">Delivered</option>
                        </select>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Update Status</button>
                </div>
            </form>
        </div>
    </div>
</div>
