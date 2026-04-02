# Direnç Bul / Ultimate Trading Komuta Merkezi - Görev Takibi

Bu dosya, tek dosya (`index.html`) mimarisini koruyarak ilerlemek için canlı bir yol haritasıdır.

## Durum Özeti

- Mimari: **Tek dosya (index.html)** ✅
- Sinyal standardı iskeleti: **eklendi** ✅
- Tip bazlı cooldown altyapısı: **eklendi** ✅
- Tip aç/kapat (enable/disable) altyapısı: **eklendi** ✅
- Derinlik (depth) tabanlı yeni dedektörler: **henüz eklenmedi** ⏳
- Senaryo motoru (Ambush/Domino/Exhaustion): **henüz eklenmedi** ⏳
- Narrative motoru güçlendirmesi: **kısmi / iyileştirilecek** ⏳

---

## Tamamlananlar

### 1) Sinyal Standardizasyonu
- [x] `SIGNAL_TYPE_GROUPS` tanımlandı.
- [x] `SIGNAL_TYPES` listesi oluşturuldu.
- [x] `createStandardSignal(...)` ile ortak sinyal şablonu tanımlandı.
- [x] Bilinmeyen tiplerin `ConfluenceCore`'a normalize edilmesi eklendi.

### 2) Sinyal Tip Yönetimi
- [x] `signalRegistry` eklendi.
- [x] `signalTypeCooldowns` eklendi (core + scenario için başlangıç değerleri).
- [x] `lastSignalByType` takip yapısı eklendi.
- [x] `signalTypeEnabled` takip yapısı eklendi.
- [x] `isSignalTypeEnabled(type)` eklendi.
- [x] `setSignalTypeEnabled(type, isEnabled)` eklendi.
- [x] `shouldEmitSignalType(type)` içinde enable + cooldown kontrolü birleştirildi.
- [x] `markSignalTypeEmitted(type)` eklendi.

### 3) Confluence Entegrasyonu
- [x] `ConfluenceEngine.generateFinalSignal(...)` artık merkezi sinyal API kullanıyor.
- [x] Emisyon öncesi `shouldEmitSignalType('ConfluenceCore')` kontrolü çalışıyor.
- [x] Emisyon sonrası `markSignalTypeEmitted('ConfluenceCore')` işleniyor.

---

## Sıradaki Plan (Öncelikli)

### A) Depth Engine (v1)
- [x] Orderbook top-N snapshot normalize helper eklendi.
- [x] `WallResilience` dedektörü (ilk sürüm: top-of-book pressure bazlı) eklendi.
- [ ] `SpoofingLadder` dedektörü (hızlı yığılma + hızlı iptal + trade ile doğrulama).
- [ ] `Absorption` dedektörü (fiyat bandı bazlı trade notional birikimi).
- [ ] Her dedektör çıkışını `createStandardSignal(...)` ile üret.

### B) Scenario Engine (v1)
- [ ] `ScenarioAmbush` kuralı (sessizlik + spoofing + ani akış).
- [ ] `ScenarioDomino` kuralı (OFD + imbalance hizası).
- [ ] `ScenarioExhaustion` kuralı (absorpsiyon + karşıt akış).
- [ ] Tip bazlı cooldownlar üzerinden emisyon kontrolü.

### C) UI/Operasyon Kontrolleri
- [ ] Ayarlar paneline “Sinyal Tipi Aç/Kapat” UI ekle.
- [ ] Ayarlar paneline “Tip Cooldown (ms)” alanları ekle.
- [ ] Bu ayarları `utc_settings` altında persist et.

### D) Güvenlik/Temizlik
- [ ] `innerHTML` kullanılan kritik alanlar için güvenlik gözden geçirmesi.
- [ ] İstenmeyen CSS/artık satırların temizliği.
- [ ] `indx.html` dosyasının rolünü netleştirme (legacy/archived).

---

## Sprint-1 Definition of Done

Aşağıdakiler tamamlanırsa Sprint-1 bitmiş sayılacak:

- [ ] En az 3 yeni core dedektör canlı (WallResilience, Spoofing, Absorption)
- [ ] En az 1 scenario sinyali canlı (Ambush veya Domino)
- [ ] Tüm yeni sinyaller merkezi standardı kullanıyor
- [ ] Tip bazlı enable/disable UI’dan değiştirilebiliyor
- [ ] Tip bazlı cooldown UI’dan değiştirilebiliyor
- [ ] Start/Stop ve mevcut confluence akışı bozulmadan çalışıyor

---

## Notlar

- Tek dosya mimarisi korunacaktır.
- Her adım küçük, geri alınabilir commitler ile ilerletilecektir.
- Bu dosya her önemli commit sonrası güncellenmelidir.
