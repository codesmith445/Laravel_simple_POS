<table class="table" width="100%">
<form wire:submit.prevent="deleteItems">
    <thead>
        <tr>
        <th><input type="checkbox" name="checkall" id="checkall" onClick="selects()" wire:model="selectAll" /> Select All</th>
        <button type="submit" class="btn btn-danger btn-sm">Delete Selected Items</button>

        <th>Section Name</th>
        <th>Action</th>
        </tr>
    </thead>
    <tbody>
           @forelse($sectionsdata as $section)
           <tr>
            <td><input value="{{ $section->id }}" wire:model="selectedItems" name="user" type="checkbox"></td>
            <td>{{ $section->section_name }}</td>
            <td>{{ $section->section_status === 1 ? 'Enabled' : 'Disabled' }}</td>
            <td>
                <div class="btn-group">
                    <a href="#editSection" data-toggle="modal" wire:click.prevent="editSection({{ $section->id }})" class="btn btn-info"><i class="fa fa-edit"></i></a>
                    <a href="#" wire:click.prevent="ConfirmDelete({{$section->id}}, '{{$section->section_name}}')" class="btn btn-danger"><i class="fa fa-trash"></i></a>
                </div>

            </td>
            </tr>
            @include('sections.edit')
            @empty
           @endforelse
       
    </tbody>

</form>
</table>


<script type="text/javascript">
            function selects() {
        var selectAllCheckbox = document.getElementById('checkall');
        var checkboxes = document.getElementsByName('user');

        for (var i = 0; i < checkboxes.length; i++) {
            checkboxes[i].checked = selectAllCheckbox.checked;
        }
    }

    
            
        </script>
