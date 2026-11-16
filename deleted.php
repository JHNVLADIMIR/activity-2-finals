<?php
require_once __DIR__ . '/core/auth.php'; requireLogin();
require_once __DIR__ . '/core/dbConfig.php'; require_once __DIR__ . '/core/models.php';
$clients = deletedClients($pdo); $automations = deletedAutomations($pdo);
function auditDate(?string $value): string { return $value ? date('M j, Y g:i A', strtotime($value)) : 'Unknown'; }
?>
<!doctype html><html lang="en"><head><meta charset="utf-8"><meta name="viewport" content="width=device-width, initial-scale=1"><title>Deleted Records | AutoPilot PH</title><link rel="stylesheet" href="styles.css"></head><body>
<?php require __DIR__ . '/core/header.php'; ?><main class="container"><section class="page-heading"><p class="eyebrow">RECORD HISTORY</p><h1>Deleted Records</h1><p class="subtitle">Soft-deleted client and automation records remain available for accountability.</p></section>
<section class="card"><div class="section-heading"><h2>Deleted Clients <span class="count-pill"><?= count($clients) ?></span></h2></div>
<?php if (!$clients): ?><p class="empty-state">No deleted clients.</p><?php else: ?><div class="table-wrap"><table><thead><tr><th>Business</th><th>Email</th><th>Originally Added By</th><th>Deleted By</th><th>Deleted At</th></tr></thead><tbody><?php foreach ($clients as $row): ?><tr><td><?= e($row['business_name']) ?></td><td><?= e($row['email']) ?></td><td><?= e($row['added_by_name']) ?></td><td><?= e($row['deleted_by_name']) ?></td><td><?= e(auditDate($row['deleted_at'])) ?></td></tr><?php endforeach; ?></tbody></table></div><?php endif; ?></section>
<section class="card"><div class="section-heading"><h2>Deleted Automations <span class="count-pill"><?= count($automations) ?></span></h2></div>
<?php if (!$automations): ?><p class="empty-state">No deleted automations.</p><?php else: ?><div class="table-wrap"><table><thead><tr><th>Automation</th><th>Client</th><th>Originally Added By</th><th>Deleted By</th><th>Deleted At</th></tr></thead><tbody><?php foreach ($automations as $row): ?><tr><td><?= e($row['automation_name']) ?></td><td><?= e($row['business_name'] ?? 'Unknown') ?></td><td><?= e($row['added_by_name']) ?></td><td><?= e($row['deleted_by_name']) ?></td><td><?= e(auditDate($row['deleted_at'])) ?></td></tr><?php endforeach; ?></tbody></table></div><?php endif; ?></section>
</main></body></html>
