@csrf
<div class="row">
    <div class="col-12">
        <div class="form-group">
            <label for="">Nombre</label>
            <input type="text" class="form-control" name="name" value="{{ isset($role) ? $role->name : old('name') }}"
                required>
        </div>
    </div>
    @can('users')
    <H3>Lista de permisos</H3>

    @foreach ($permissionsWithStatus as $permissionStatus)
    <label>
        <input type="checkbox" name="permissions[]" value="{{ $permissionStatus['permission']->name }}" {{ $permissionStatus['checked'] ? 'checked' : '' }}>
        {{ $permissionStatus['permission']->name }}
    </label>
    @endforeach

    @endcan

    <div>
