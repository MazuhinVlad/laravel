<label>Назва
    <input type="text" name="title" value="{{ old('title', $book->title ?? '') }}" required>
    @error('title') <span class="error">{{ $message }}</span> @enderror
</label>
<label>Автор
    <input type="text" name="author" value="{{ old('author', $book->author ?? '') }}" required>
    @error('author') <span class="error">{{ $message }}</span> @enderror
</label>
<label>Рік видання
    <input type="number" name="year" min="1" max="2100" value="{{ old('year', $book->year ?? '') }}" required>
    @error('year') <span class="error">{{ $message }}</span> @enderror
</label>
<label>Опис
    <textarea name="description" rows="4">{{ old('description', $book->description ?? '') }}</textarea>
    @error('description') <span class="error">{{ $message }}</span> @enderror
</label>
<input type="hidden" name="is_available" value="0">
<label><input type="checkbox" name="is_available" value="1"
    @checked(old('is_available', isset($book) ? $book->is_available : true))> В наявності</label>
@error('is_available') <span class="error">{{ $message }}</span> @enderror
<button type="submit">Зберегти</button>
