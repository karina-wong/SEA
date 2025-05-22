<tr>
    <td>
        <input type="checkbox" name="delete_ids[]" value="<?= htmlspecialchars($row['id']) ?>">
    </td>
    <td><?= htmlspecialchars($row['EOInumber']) ?></td>
    <td><?= htmlspecialchars($row['JobReferenceNumber']) ?></td>
    <td><?= htmlspecialchars($row['FirstName']) ?></td>
    <td><?= htmlspecialchars($row['LastName']) ?></td>
    <td><?= htmlspecialchars($row['DOB']) ?></td>
    <td><?= htmlspecialchars($row['Gender']) ?></td>
    <td><?= htmlspecialchars($row['StreetAddress']) ?></td>
    <td><?= htmlspecialchars($row['Suburb']) ?></td>
    <td><?= htmlspecialchars($row['State']) ?></td>
    <td><?= htmlspecialchars($row['Postcode']) ?></td>
    <td><?= htmlspecialchars($row['Email']) ?></td>
    <td><?= htmlspecialchars($row['Phone']) ?></td>
    <td><?= htmlspecialchars($row['Skill1']) ?>,
    <?= htmlspecialchars($row['Skill2']) ?>,
    <?= htmlspecialchars($row['Skill3']) ?>
    <?= htmlspecialchars($row['Skill4']) ?>
    <?= htmlspecialchars($row['Skill5']) ?>
    <?= htmlspecialchars($row['OtherSkills']) ?>
    </td>
    <td><?= htmlspecialchars($row['ENUM']) ?></td>
</tr>