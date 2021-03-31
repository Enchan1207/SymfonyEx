//
// エントリポイント
//

// CSS (コンパイルするとapp.cssに生成されるとかされないとか)
import './styles/app.scss';
import 'bootstrap';

// ファイル選択フォームをBootstrap-likeにしてくれるらしい
import bsCustomFileInput from 'bs-custom-file-input';
bsCustomFileInput.init();

// 他のjsをimport
import './scripts/main';
