<label>Nome</label><br>
<input name="nome"
       value="<?= htmlspecialchars($cliente['nome'] ?? '') ?>"
       required><br><br>

<label>E-mail</label><br>
<input name="email"
       value="<?= htmlspecialchars($cliente['email'] ?? '') ?>"><br><br>

