<select
    name="{{ $name }}"
    id="{{ $id }}"
    class="{{ $class }}"
>
    @forelse ($options as $id => $name)
        <option
            value="{{ $id }}"
            {{ old($name, $selected ?? null) == $id ? 'selected' : '' }}
        >
            {{ $name }}
        </option>
    @empty
    @endforelse
</select>
