@extends('layouts.app')

@section('title', '利用規約 【予約管理ならヨヤクマ】')
@section('description', '本利用規約、その他、ヨヤクマが定める一切の規約・規程は、当方のウェブサイトが提供する予約管理システムを利用（予約、予約管理、データ送信、アカウント登録を含みます。）する全ての個人又は法人に適用されます。')

@section('content')

    <div class="page-title">
        <h1>利用規約</h1>
    </div>  

    <section class="container">
    	 <div id="pankuzu">
    	  <ol class="breadcrumb">
    		  <li class="breadcrumb-item"><a href="{{ url('/') }}"><i class="fas fa-home"></i></a></li>
      		  <li class="breadcrumb-item active">利用規約</li>
    	  </ol>
    	</div>
    </section>

    <section class="m-container">
        <div class="legal_notice">
            <img src="{{ asset('img/terms.svg')}}" alt="利用規約">
            <h4>TERMS</h4>

            <div class="legal_notice-title">
                <h2>利用規約</h2>
            </div>
        </div>
        
        <div class="privacy_terms">
            <p class="p-t-p">本利用規約、その他、ヨヤクマ（以下、「当方」といいます。）が定める一切の規約・規程（以下「本規約」と総称します。）は、当方のウェブサイトが提供する予約管理システム（ 以下「本サービス」といいます。）を利用（予約、予約管理、データ送信、アカウント登録を含みます。）する全ての個人又は法人（以下「ユーザー」といいます。）に適用されます。<br>
            <br>ユーザーは、本サービスを利用することにより、本規約の全ての規定に同意したものとみなされます。本規約に同意いただけない方は、本サービスを利用することはできません。</p>
            
            <div class="serviceTerms">
                <h3><span>サービス規約</span></h3>
            </div>

            <article class="p-t_conts">
                <h3>１．定義</h3>
                <table>
                    <tbody>
                        <tr>
                            <td class="p-t-o">1.</td>
                            <td>「登録ユーザー」とは、本サービスにアカウント登録をした個人又は法人をいいます。</td>
                        </tr>
                        <tr>
                            <td class="p-t-o">2.</td>
                            <td>「対象サービス」とは、サービス提供者が提供するサービスで、本サービスにおいて予約の対象となるサービスをいいます。</td>
                        </tr>
                        <tr>
                            <td class="p-t-o">3.</td>
                            <td>「サービス提供者」とは、本サービスにおいて、対象サービスを提供する又は提供しようとする個人又は法人をいいます。</td>
                        </tr>
                        <tr>
                            <td class="p-t-o">4.</td>
                            <td>「予約者」とは、サービス提供者が提供する対象サービスを利用する又は利用しようとする個人又は法人をいいます。</td>
                        </tr>
                        <tr>
                            <td class="p-t-o">5.</td>
                            <td>「本サービス利用契約」とは、本規約に基づいてサービス提供者又は予約者と当方との間において成立する本サービスの利用に係る契約をいいます。</td>
                        </tr>
                        <tr>
                            <td class="p-t-o">6.</td>
                            <td>「投稿コンテンツ」とは、ユーザーが本サービスを利用して作成した予約ページ、その他送信する一切の情報（文章、画像、その他のデータを含みますがこれらに限りません。）を意味します。</td>
                        </tr>
                        <tr>
                            <td class="p-t-o">7.</td>
                            <td>「営業日」とは、土曜日、日曜日、国民の祝日（国民の祝日に関する法律に規定される国民の祝日をいう。）及び当方の休業日を除いた日をいいます。</td>
                        </tr>
                    </tbody>
                </table>
            </article>

            <article class="p-t_conts">
                <h3>2．アカウント登録</h3>
                <table>
                    <tbody>
                        <tr>
                            <td class="p-t-o">1.</td>
                            <td>ユーザーは、本規約を遵守することに同意し、当方所定の手続によりアカウント登録の申込をすることができます。</td>
                        </tr>
                        <tr>
                            <td class="p-t-o">2.</td>
                            <td>ユーザーは、アカウント登録の情報を虚偽なく正確に入力し、常に最新の情報となるよう修正するものとします。なお、メールアドレスは日常的に利用し、受信内容を日常的に確認できるものを利用するものとします。</td>
                        </tr>
                        <tr>
                            <td class="p-t-o">3.</td>
                            <td>
                                第1項の申込者が以下の各号のいずれかの事由に該当すると当方が合理的に判断する場合（アカウント登録後に該当することが判明した場合を含みます。）、アカウント登録・本サービスの利用継続を拒否することがあり、また、当方は、その理由について一切開示義務を負いません。
                                <table class="u-layers">
                                    <tr>
                                        <td class="p-t-o">⑴</td>
                                        <td>当方に提供した登録事項の全部又は一部につき虚偽、誤記又は記載漏れがあった場合</td>
                                    </tr>
                                    <tr>
                                        <td class="p-t-o">⑵</td>
                                        <td>本規約に定める禁止事項に違反する場合</td>
                                    </tr>
                                    <tr>
                                        <td class="p-t-o">⑶</td>
                                        <td>過去に本規約に違反したことがある場合、もしくは当方が不適切であると判断した者からの申込である場合</td>
                                    </tr>
                                    <tr>
                                        <td class="p-t-o">⑷</td>
                                        <td>申込者が、当方、他の予約者又はサービス提供者との意思疎通が困難と認められる場合</td>
                                    </tr>
                                    <tr>
                                        <td class="p-t-o">⑸</td>
                                        <td>申込者が未成年者、成年被後見人、被保佐人又は被補助人であり、法定代理人、後見人、保佐人又は補助人の同意等を得ていなかった場合</td>
                                    </tr>
                                    <tr>
                                        <td class="p-t-o">⑹</td>
                                        <td>申込者が反社会的勢力等である又は反社会的勢力等に資金提供をする等反社会的勢力等と何らかの関与をしている場合</td>
                                    </tr>
                                    <tr>
                                        <td class="p-t-o">⑺</td>
                                        <td>その他アカウント登録の申込を不適切と当方が判断した場合</td>
                                    </tr>
                                </table>
                            </td>
                        </tr>
                        <tr>
                            <td class="p-t-o">4.</td>
                            <td>法人又は団体であるユーザーがアカウント登録をする場合、当該ユーザーは、当該法人等の正確な名称の情報を入力して申込をするものとし（なお、当該情報に変更が生じた場合、変更後の情報を当方に通知するものとし、当方が求めた場合には、最新かつ正確な商号・電話番号を通知するものとします。）、当該情報が不明確な場合、当該申込をした個人が当該アカウント登録をした登録ユーザーとしての義務の一切を負担することに同意します。</td>
                        </tr>
                        <tr>
                            <td class="p-t-o">5.</td>
                            <td>当方は、登録ユーザーに対して、アカウント登録をした法人、団体又はその代表者等について追加の資料又は情報を求めることがあり、登録ユーザーはこれに協力するものとします。</td>
                        </tr>
                    </tbody>
                </table>
            </article>
            
            <article id="price_cancellation" class="p-t_conts">
                <h3>3．料金と解約</h3>
                <table>
                    <tbody>
                        <tr>
                            <td class="p-t-o">1.</td>
                            <td>サービス提供者は、本サービスの利用に関して、有料会員登録を行った際は月額3,278円（税込）をお支払いいただくものとなります。お支払い方法はクレジットカード決済のみとなり、登録日時から1ヶ月ごとに処理されます。</td>
                        </tr>
                        <tr>
                            <td class="p-t-o">2.</td>
                            <td>サービス提供者が本サービスの利用に関する料金の支払を遅滞した場合、予約ページは一時的に非公開状態となります。</td>
                        </tr>
                        <tr>
                            <td class="p-t-o">3.</td>
                            <td>解約をされる場合は有料会員登録ページより解約が可能で、解約をした時点で予約ページは非公開状態となり、次回以降のご請求がされることはありません。</td>
                        </tr>
                    </tbody>
                </table>
            </article>

            <article class="p-t_conts">
                <h3>4．環境設定等</h3>
                <table>
                    <tbody>
                        <tr>
                            <td class="p-t-o">1.</td>
                            <td>ユーザーは、本サービスを利用するにあたって必要な通信環境、ハードウェア及びソフトウェアを自己の責任と費用負担によって準備し、本サービスを利用するものとします。なお、本サービスの利用に伴う通信費用は、ユーザーの負担となります。</td>
                        </tr>
                        <tr>
                            <td class="p-t-o">2.</td>
                            <td>ユーザーは、投稿コンテンツについてのデータ・情報は、自らの責任で同一のデータ等をバックアップとして保存しておくものとし、当方は、かかるデータ等の保管、保存、バックアップ等に関して、一切責任を負わないものとします。</td>
                        </tr>
                    </tbody>
                </table>
            </article>

            <article class="p-t_conts">
                <h3>5． 確認事項</h3>
                <table>
                    <tbody>
                        <tr>
                            <td class="p-t-o">1.</td>
                            <td>ユーザーは、アカウント登録に必要なID（メールアドレス）とパスワードをユーザー自身の責任によって管理するものとします。</td>
                        </tr>
                        <tr>
                            <td class="p-t-o">2.</td>
                            <td>ユーザーは、ID（メールアドレス）及びパスワードを第三者に利用されないよう、容易に推測できないパスワードや定期的な変更等の手段により、ユーザー本人が責任をもって管理するものとします。</td>
                        </tr>
                        <tr>
                            <td class="p-t-o">3.</td>
                            <td>入力されたID（メールアドレス）及びパスワードがアカウント登録された情報と一致することを当方が確認した場合、当該アカウントのユーザー本人による利用があったものとみなし、万一それらが盗用、不正使用その他の事情によりユーザー本人以外の者が利用している場合であっても、それにより生じた損害等について、ユーザーの故意又は過失の有無を問わず、当方は一切の責任を負いません。</td>
                        </tr>
                        <tr>
                            <td class="p-t-o">4.</td>
                            <td>ユーザーは、予約ページを運用する上で、予約ページに記載された利用規約に準ずるものとします。</td>
                        </tr>
                        <tr>
                            <td class="p-t-o">5.</td>
                            <td>
                                当方は、以下の各号に該当する場合に、当方の合理的な判断によって、ユーザーの投稿コンテンツを事前の通知なく削除、非公開化することができるものとします。
                                <table class="u-layers">
                                    <tr>
                                        <td class="p-t-o">⑴</td>
                                        <td>本規約に違反した場合</td>
                                    </tr>
                                    <tr>
                                        <td class="p-t-o">⑵</td>
                                        <td>社会通念や本規約の精神に照らして不適切と判断された場合</td>
                                    </tr>
                                    <tr>
                                        <td class="p-t-o">⑶</td>
                                        <td>不快又は違反の報告が他のユーザーからあった場合</td>
                                    </tr>
                                    <tr>
                                        <td class="p-t-o">⑷</td>
                                        <td>その他当方が不適切と判断した場合</td>
                                    </tr>
                                </table>
                            </td>
                        </tr>
                        <tr>
                            <td class="p-t-o">6.</td>
                            <td>当方は、当方の権利・財産やサービス等の保護、又は第三者の生命、身体もしくは財産の保護等の目的から差し迫った必要があると当方が判断した場合には、必要な範囲内で投稿コンテンツその他ユーザーが提供した情報を裁判所や警察等の公的機関に開示・提供することができるものとします。</td>
                        </tr>
                        <tr>
                            <td class="p-t-o">7.</td>
                            <td>当方は、本サービス利用事例を紹介する際に、登録ユーザーのロゴ等を利用することがあります。但し、当社が事前に照会し、当該登録ユーザー等が異議を述べた場合はこの限りではありません。</td>
                        </tr>
                        <tr>
                            <td class="p-t-o">8.</td>
                            <td>満18歳未満の方は、本サービスを利用することはできません。</td>
                        </tr>
                        <tr>
                            <td class="p-t-o">9.</td>
                            <td>本サービスは、日本国内において提供されるものであり、当方は、ユーザーが本サービスを日本国外で利用したことに関連して生じた損害について一切の責任を負いません。</td>
                        </tr>
                    </tbody>
                </table>
            </article>

            
            <article class="p-t_conts">
                <h3>6． 譲渡禁止</h3>
                <p>ユーザーは、第三者にその登録ユーザーID（メールアドレス）及びパスワード、本規約その他申込書等に基づきユーザーと当方との間に締結される契約における地位及び権利・義務について、当方の書面による承諾のない限り、利用許可・譲渡・売買・貸与・承継・担保設定、その他の処分をすることはできません。</p>
            </article>

            <article class="p-t_conts">
                <h3>7． 反社会的勢力等の排除</h3>
                <table>
                    <tbody>
                        <tr>
                            <td class="p-t-o">1.</td>
                            <td>
                                ユーザーは、現在、暴力団、暴力団員、暴力団員でなくなった時から5年を経過しない者、暴力団準構成員、暴力団関係企業、総会屋等、社会運動等標ぼうゴロ又は特殊知能暴力集団等、その他これらに準ずる者（以下「反社会的勢力等」と総称します。）に該当しないこと、および次の各号のいずれにも該当しないことを表明し、かつ、将来にわたっても該当しないことを確約します。
                                <table class="u-layers">
                                    <tr>
                                        <td class="p-t-o">⑴</td>
                                        <td>反社会的勢力等が経営を支配していると認められる関係を有すること</td>
                                    </tr>
                                    <tr>
                                        <td class="p-t-o">⑵</td>
                                        <td>反社会的勢力等が経営に実質的に関与していると認められる関係を有すること</td>
                                    </tr>
                                    <tr>
                                        <td class="p-t-o">⑶</td>
                                        <td>自己、自社もしくは第三者の不正の利益を図る目的又は第三者に損害を加える目的をもってする等、不当に反社会的勢力等を利用していると認められる関係を有すること</td>
                                    </tr>
                                    <tr>
                                        <td class="p-t-o">⑷</td>
                                        <td>反社会的勢力等に対して反社会的勢力等と知りながら資金を提供し、又は便宜を供与する等の関与をしていると認められる関係を有すること</td>
                                    </tr>
                                    <tr>
                                        <td class="p-t-o">⑸</td>
                                        <td>役員又は経営に実質的に関与している者が反社会的勢力等と社会的に非難されるべき関係を有すること</td>
                                    </tr>
                                </table>
                            </td>
                        </tr>
                        <tr>
                            <td class="p-t-o">2.</td>
                            <td>
                                ユーザーは、自ら又は第三者をして、次の各号の一にでも該当する行為を行わないことを確約します。
                                <table class="u-layers">
                                    <tr>
                                        <td class="p-t-o">⑴</td>
                                        <td>暴力的な要求行為</td>
                                    </tr>
                                    <tr>
                                        <td class="p-t-o">⑵</td>
                                        <td>法的な責任を超えた不当な要求行為</td>
                                    </tr>
                                    <tr>
                                        <td class="p-t-o">⑶</td>
                                        <td>取引に関して、脅迫的な言動をし、又は暴力を用いる行為</td>
                                    </tr>
                                    <tr>
                                        <td class="p-t-o">⑷</td>
                                        <td>風説を流布し、偽計を用い、もしくは威力を用いて相手方の信用を毀損し、又は相手方の業務を妨害する行為</td>
                                    </tr>
                                    <tr>
                                        <td class="p-t-o">⑸</td>
                                        <td>その他前各号に準ずる行為</td>
                                    </tr>
                                </table>
                            </td>
                        </tr>
                        <tr>
                            <td class="p-t-o">3.</td>
                            <td>当方は、ユーザーが前各項のいずれかに違反したと合理的に判断した場合、催告及び自己の債務の履行の提供をすることなく、本サービスの利用停止、登録ユーザーの資格の剥奪、投稿コンテンツの削除、その他必要と認められる措置を事前の通知なく当方の合理的な判断によって実施するものとし、また、当方は、その理由について一切開示義務を負いません。</td>
                        </tr>
                    </tbody>
                </table>
            </article>

            <article class="p-t_conts">
                <h3>8． 禁止事項</h3>
                <table>
                    <tbody>
                        <tr>
                            <td class="p-t-o">1.</td>
                            <td>
                                本サービスの利用について、ユーザーの故意又は過失を問わず、以下の各号に該当すると当方が合理的に判断する行為を禁止します。ユーザーが禁止行為を行った場合は、当方は、事前の告知なく該当箇所の削除や本サービスの利用停止、登録ユーザーの資格の剥奪、投稿コンテンツの削除、その他必要と認められる措置を事前の通知なく当方の合理的な判断によって実施するものとし、また、当方は、その理由について一切開示義務を負いません。
                                <table class="u-layers">
                                    <tr>
                                        <td>・</td>
                                        <td>本規約に違反する行為</td>
                                    </tr>
                                    <tr>
                                        <td>・</td>
                                        <td>ねずみ講、マルチ商法、マルチレベルマーケティング、チェーンメール送信又はこれらに類する行為</td>
                                    </tr>
                                    <tr>
                                        <td>・</td>
                                        <td>本サービスとは関連性がない又は関連性が著しく小さいと当方が判断する団体やサービス、宗教、活動への勧誘</td>
                                    </tr>
                                    <tr>
                                        <td>・</td>
                                        <td>政治活動及び宗教活動</td>
                                    </tr>
                                    <tr>
                                        <td>・</td>
                                        <td>本サービスの二次利用、複製行為及びこれらを目的とする行為</td>
                                    </tr>
                                    <tr>
                                        <td>・</td>
                                        <td>法令又は又は法令上拘束力のある行政措置に違反する行為又はこれらを助長する行為</td>
                                    </tr>
                                    <tr>
                                        <td>・</td>
                                        <td>公序良俗に反し又は善良な風俗を害する行為</td>
                                    </tr>
                                    <tr>
                                        <td>・</td>
                                        <td>セクシャルハラスメント、ストーキング、その他第三者に対する嫌がらせ行為</td>
                                    </tr>
                                    <tr>
                                        <td>・</td>
                                        <td>適法でない又は適法か否かについて判断がつきにくい医療行為</td>
                                    </tr>
                                    <tr>
                                        <td>・</td>
                                        <td>詐欺、規制薬物の濫用、マネーロンダリング等の犯罪に結びつく又は結びつくおそれのある行為</td>
                                    </tr>
                                    <tr>
                                        <td>・</td>
                                        <td>法律で義務付けられている免許、資格条件を満たしていない対象サービスの提供及び利用</td>
                                    </tr>
                                    <tr>
                                        <td>・</td>
                                        <td>架空取引（自分との取引又は取引があるかのように第三者と通謀する行為等）を行う行為</td>
                                    </tr>
                                    <tr>
                                        <td>・</td>
                                        <td>性的な内容又は性的な内容を暗黙的に示唆する表現を記載する行為</td>
                                    </tr>
                                    <tr>
                                        <td>・</td>
                                        <td>芸術性の有無に関わらず、露出度の高い画像の投稿行為</td>
                                    </tr>
                                    <tr>
                                        <td>・</td>
                                        <td>グロテスク・暴力的な表現の投稿行為</td>
                                    </tr>
                                    <tr>
                                        <td>・</td>
                                        <td>未成年者の人格形成等に悪影響を与えると当方が判断する行為</td>
                                    </tr>
                                    <tr>
                                        <td>・</td>
                                        <td>民族、人種、性別、年齢による差別につながる表現行為</td>
                                    </tr>
                                    <tr>
                                        <td>・</td>
                                        <td>他のユーザーが不快と感じる表現の投稿行為</td>
                                    </tr>
                                    <tr>
                                        <td>・</td>
                                        <td>当方が不適切と認める表現・投稿・書込行為</td>
                                    </tr>
                                    <tr>
                                        <td>・</td>
                                        <td>性的交渉の勧誘行為又は出会いを希望する行為</td>
                                    </tr>
                                    <tr>
                                        <td>・</td>
                                        <td>当方、ユーザー、その他第三者の知的財産権、肖像権その他の権利又は名誉、プライバシーを毀損する行為</td>
                                    </tr>
                                    <tr>
                                        <td>・</td>
                                        <td>個人を特定できる情報（メールアドレス、電話番号、住所等）の掲載行為</td>
                                    </tr>
                                    <tr>
                                        <td>・</td>
                                        <td>本サービスを通じて得られた予約者の情報や機密情報を、当該ユーザーの事前の承諾なしに本サービス以外の目的で利用し又は第三者に提供する行為</td>
                                    </tr>
                                    <tr>
                                        <td>・</td>
                                        <td>本サービスの脆弱性やバグ・仕様不備の利用、人為的な高負荷の発生行為</td>
                                    </tr>
                                    <tr>
                                        <td>・</td>
                                        <td>虚偽の情報記載による他人へのなりすまし行為</td>
                                    </tr>
                                    <tr>
                                        <td>・</td>
                                        <td>自己又は他人の名称、住所、電話番号、メールアドレス等について、意図的に虚偽の情報を登録する行為</td>
                                    </tr>
                                    <tr>
                                        <td>・</td>
                                        <td>虚偽又は不正確な内容を掲載する行為</td>
                                    </tr>
                                    <tr>
                                        <td>・</td>
                                        <td>悪意のある投稿等を掲載する行為</td>
                                    </tr>
                                    <tr>
                                        <td>・</td>
                                        <td>本サービスに関する契約上の地位・権利・義務の第三者への譲渡、共有、交換行為</td>
                                    </tr>
                                    <tr>
                                        <td>・</td>
                                        <td>本サービスの利用停止、アカウント登録抹消された者が、再度、本サービスを利用、アカウント登録を試みる行為</td>
                                    </tr>
                                    <tr>
                                        <td>・</td>
                                        <td>上記のいずれかに該当すると当方が判断する行為及び当社が不適切と判断する全ての行為</td>
                                    </tr>
                                </table>
                            </td>
                        </tr>
                        <tr>
                            <td class="p-t-o">2.</td>
                            <td>ユーザーは、本規約の違反行為その他本サービスの不適切な利用に起因して当方に生じた損害（合理的な弁護士費用を含みます。）を賠償するものとします。</td>
                        </tr>
                    </tbody>
                </table>
            </article>
            
            <article class="p-t_conts">
                <h3>9． 個人情報</h3>
                <table>
                    <tbody>
                        <tr>
                            <td class="p-t-o">1.</td>
                            <td>ユーザーは、本サービスに関連して当方が知り得たユーザーの個人情報を当方のプライバシーポリシー及び本規約に従って取り扱うことにつき同意するものとします。</td>
                        </tr>
                        <tr>
                            <td class="p-t-o">2.</td>
                            <td>当方は、本サービスを提供する上でユーザーにとって必要な情報を、ユーザーに対し、電子メール、郵便、電話等によって連絡をすることができるものとします。</td>
                        </tr>
                        <tr>
                            <td class="p-t-o">3.</td>
                            <td>ユーザーは、個人情報を適切に管理し、第三者による盗取・漏洩等の発生防止の措置を講じ、法令を遵守するものとします。</td>
                        </tr>
                        <tr>
                            <td class="p-t-o">4.</td>
                            <td>ユーザーは、予約ページを運用する上で、予約者の個人情報の取り扱いについて、予約ページに記載されたプライバシーポリシーに準ずるものとします。</td>
                        </tr>
                    </tbody>
                </table>
            </article>
            
            <article class="p-t_conts">
                <h3>10． 本サービスの停止</h3>
                <table>
                    <tbody>
                        <tr>
                            <td class="p-t-o">1.</td>
                            <td>
                                当方は、以下のいずれかに該当する場合には、ユーザーに事前の通知することなく、本サービスの利用の一部又は全部を停止又は中断することができるものとします。
                                <table class="u-layers">
                                    <tr>
                                        <td class="p-t-o">⑴</td>
                                        <td>本サービスに係るシステムの点検又は保守作業を定期的又は緊急に行う場合</td>
                                    </tr>
                                    <tr>
                                        <td class="p-t-o">⑵</td>
                                        <td>地震、火災、停電等の不可抗力により本サービスの運営ができなくなった場合</td>
                                    </tr>
                                    <tr>
                                        <td class="p-t-o">⑶</td>
                                        <td>その他、当方が停止又は中断を必要と合理的に判断した場合</td>
                                    </tr>
                                </table>
                            </td>
                        </tr>
                        <tr>
                            <td class="p-t-o">2.</td>
                            <td>当方は、当方の合理的な判断により、本サービスの内容を変更し又は提供を終了することができます。</td>
                        </tr>
                        <tr>
                            <td class="p-t-o">3.</td>
                            <td>当方が本サービスの提供を終了する場合、当方は登録ユーザーに事前に通知するものとします。</td>
                        </tr>
                    </tbody>
                </table>
            </article>
            
            <article class="p-t_conts">
                <h3>11． 利用停止等</h3>
                <table>
                    <tbody>
                        <tr>
                            <td class="p-t-o">1.</td>
                            <td>
                                当方は、ユーザーが下記のいずれかの事由に該当したと当方が合理的に判断した場合、事前の通知なく、本サービスの一部又は全部の利用停止措置やアカウント登録の抹消を実施する場合があります。当該ユーザーはこれに対して理由の開示要求や異議申立てをすることはできません。
                                <table class="u-layers">
                                    <tr>
                                        <td>・</td>
                                        <td>本規約に違反したとき</td>
                                    </tr>
                                    <tr>
                                        <td>・</td>
                                        <td>当方に提供した情報の全部又は一部につき、虚偽又は不正確な事実があることが判明したとき</td>
                                    </tr>
                                    <tr>
                                        <td>・</td>
                                        <td>不法行為を行い、又は法令等に違反したとき</td>
                                    </tr>
                                    <tr>
                                        <td>・</td>
                                        <td>反社会勢力もしくは反社会的活動を行う団体に所属、又は資金提供や経営に関係するなどこれらと関係を有すると当方が判断したとき</td>
                                    </tr>
                                    <tr>
                                        <td>・</td>
                                        <td>虚偽の内容を記載・投稿したと当方が判断したとき</td>
                                    </tr>
                                    <tr>
                                        <td>・</td>
                                        <td>破産手続開始、民事再生手続開始、会社更生手続開始の申立てを行うか、第三者から当該申立てを受けたとき、差押、仮差押、仮処分又は滞納処分を受け、その他当該ユーザーの信用を著しく悪化させる事態が生じたとき</td>
                                    </tr>
                                    <tr>
                                        <td>・</td>
                                        <td>銀行取引停止処分を受けたとき</td>
                                    </tr>
                                    <tr>
                                        <td>・</td>
                                        <td>対象サービスの利用、又は対象サービスの提供において誠実な対応や義務の履行がなされなかったとき</td>
                                    </tr>
                                    <tr>
                                        <td>・</td>
                                        <td>当方からの問い合わせその他の回答を求める連絡に対して20日間以上応答がない場合</td>
                                    </tr>
                                    <tr>
                                        <td>・</td>
                                        <td>当方又は本サービスの信用を毀損し、又は当方の営業を妨害したとき</td>
                                    </tr>
                                    <tr>
                                        <td>・</td>
                                        <td>他のユーザー、第三者とのトラブル、クレーム又は違反報告が当方の定める一定の基準に到達したと当方が判断したとき</td>
                                    </tr>
                                    <tr>
                                        <td>・</td>
                                        <td>その他当方がユーザーとして相応しくない、又は継続した本サービス利用に相応しくないと判断したとき</td>
                                    </tr>
                                </table>
                            </td>
                        </tr>
                        <tr>
                            <td class="p-t-o">2.</td>
                            <td>ユーザーは、本条による利用停止等の後も、当方及び第三者に対する本規約上の一切の義務及び債務（損害賠償債務を含みますが、これに限りません。）を免れるものではありません。</td>
                        </tr>
                        <tr>
                            <td class="p-t-o">3.</td>
                            <td>当方は、ユーザーが第1項各号に該当し又は該当するおそれがあると当方が合理的に判断した場合、その他当方が必要と認める場合には、ユーザーに対し、違反行為の中止、送信又は投稿した情報の自発的な削除・訂正等を求めることがあり、ユーザーは、当方が求める期間内に当該求めに応じるものとします。</td>
                        </tr>
                        <tr>
                            <td class="p-t-o">4.</td>
                            <td>当方は、本条に基づき当方が行った措置によりユーザーに生じた不利益や損害について、当方に故意又は重過失がある場合を除き、一切の責任を負いません。</td>
                        </tr>
                    </tbody>
                </table>
            </article>

            <article class="p-t_conts">
                <h3>12． 権利の帰属</h3>
                <table>
                    <tbody>
                        <tr>
                            <td class="p-t-o">1.</td>
                            <td>当方ウェブサイト又は本サービスに関する知的財産権、営業秘密等の一切の権利は、全て当方又はその他権利者に帰属しており、ユーザーは、当方又はその他権利者の事前の書面による許諾なくして自ら利用し又は第三者に利用させることはできません。</td>
                        </tr>
                        <tr>
                            <td class="p-t-o">2.</td>
                            <td>ユーザーは、自らの投稿コンテンツが第三者の知的財産権その他権利を侵害していないことを表明、保証します。</td>
                        </tr>
                        <tr>
                            <td class="p-t-o">3.</td>
                            <td>当方は、本サービスの提供・改善・紹介のために、必要な範囲で、投稿コンテンツを利用することがあります。</td>
                        </tr>
                    </tbody>
                </table>
            </article>
            
            <article class="p-t_conts">
                <h3>13． 外部サービス</h3>
                <table>
                    <tbody>
                        <tr>
                            <td class="p-t-o">1.</td>
                            <td>本サービスは自社サイト、SNS、ブログ等の外部サービスと連携してサービスを提供することがあります。</td>
                        </tr>
                        <tr>
                            <td class="p-t-o">2.</td>
                            <td>外部サービスと連携した本サービスを利用する場合は、ユーザーは、自らの責任において外部サービスを利用するものとします。外部サービスの仕様によっては、外部サービス上に投稿内容が表示される場合がありますが、当社は外部サービス上の当該投稿内容について編集又は削除する義務を負いません。</td>
                        </tr>
                        <tr>
                            <td class="p-t-o">3.</td>
                            <td>ユーザーは、本サービスと連携した外部サービスを利用する場合、当該連携事業者及び外部サービスの各規約に従うものとします。</td>
                        </tr>
                        <tr>
                            <td class="p-t-o">4.</td>
                            <td>ユーザーが外部サービスを利用したこと、又は本サービスと外部サービスの連携が変更・中断・中止したことによりユーザー又は第三者に生じた問題・損害につき、当方は、一切の責任を負いません。</td>
                        </tr>
                    </tbody>
                </table>
            </article>
            
            <article class="p-t_conts">
                <h3>14． 免責等</h3>
                <table>
                    <tbody>
                        <tr>
                            <td class="p-t-o">1.</td>
                            <td>当方は、本サービスを通じてサービス提供者が提供する情報、本サービスからリンクが張られた他のサイトで表示される情報その他対象サービスに関する情報正確性・信頼性・安全性・適法性・道徳性・最新性・有用性・適合性・完全性・妥当性や対象サービスにより予約者の期待に沿うことを保証しません。</td>
                        </tr>
                        <tr>
                            <td class="p-t-o">2.</td>
                            <td>サービス提供者は、対象サービスに関する投稿・広告等に関して一切の責任を負うものとし、予約者その他第三者との間の紛争は、自らの責任と費用においてを解決するものとします。</td>
                        </tr>
                        <tr>
                            <td class="p-t-o">3.</td>
                            <td>本サービスに関し、ユーザー間、サービス提供者と予約者との間で又はユーザーと第三者との間で紛争が生じた場合、ユーザーは、自己の責任と費用において解決するものとし、当方は、当該紛争に関与する義務を負わないものとします。</td>
                        </tr>
                        <tr>
                            <td class="p-t-o">4.</td>
                            <td>当方は、本サービスにつき、エラー・バグ・不具合等がないこと、ユーザーに適用される法令又は内部規則等に適合すること、対象サービスの売上・予約者の増加その他ユーザーが期待する性質を有することを保証しません。</td>
                        </tr>
                        <tr>
                            <td class="p-t-o">5.</td>
                            <td>当方は、債務不履行、不法行為その他法律上の請求原因の如何を問わず、本サービス又は本規約に関連してユーザーが被った損害について、当方の故意又は重過失に起因する場合を除き、賠償する責任を一切負わないものとします。</td>
                        </tr>
                    </tbody>
                </table>
            </article>
            
            <article class="p-t_conts">
                <h3>15． 秘密保持</h3>
                <table>
                    <tbody>
                        <tr>
                            <td class="p-t-o">1.</td>
                            <td>ユーザーは、当方の事前の書面による承諾がある場合を除き、本サービスに関連して当方が秘密である旨指定した情報を秘密に取り扱うものとします。</td>
                        </tr>
                        <tr>
                            <td class="p-t-o">2.</td>
                            <td>ユーザーは、当方から求められた場合はいつでも、当方の指示に従い、遅滞なく、前項の情報及び当該情報を記載又は記録した書面その他の記録媒体物並びにその全ての複製物等を返却又は廃棄しなければなりません。</td>
                        </tr>
                    </tbody>
                </table>
            </article>
            
            <article class="p-t_conts">
                <h3>16． 紛争処理</h3>
                <table>
                    <tbody>
                        <tr>
                            <td class="p-t-o">1.</td>
                            <td>対象サービスに関する契約は、サービス提供者と予約者との間で成立するものとします。</td>
                        </tr>
                        <tr>
                            <td class="p-t-o">2.</td>
                            <td>サービス提供者と予約者との間で紛争が発生した場合、当該当事者間で紛争を解決するものとし、当該紛争により、当方又は第三者に損害が生じた場合、サービス提供者と予約者は連帯して、当方及び第三者に対して、当該損害を賠償するものとします。</td>
                        </tr>
                        <tr>
                            <td class="p-t-o">3.</td>
                            <td>本サービスの利用に関連し、ユーザーが他のユーザー又は第三者からクレームや本規約の違反報告を受けた場合、直ちに当方に通知し、当該ユーザーの責任と費用によって解決するものとします。</td>
                        </tr>
                        <tr>
                            <td class="p-t-o">4.</td>
                            <td>ユーザーによる本サービスの利用に関連して、当方が、他のユーザーその他の第三者から権利侵害その他の理由により何らかの請求を受けた場合は、当該ユーザーは、当該請求に基づき当方が当該第三者に支払いを余儀なくされた費用（弁護士費用を含みます。）や賠償金を負担するものとします。</td>
                        </tr>
                    </tbody>
                </table>
            </article>
            
            <article class="p-t_conts">
                <h3>17． 規約変更</h3>
                <p>当方は、本規約（当方のウェブサイトに掲載する本サービスに関するルール、諸規定等を含みます。以下本項において同じ。）を変更できるものとします。当方は、本規約を変更する場合には、ユーザーに本規約を変更する旨及び変更後の内容並びにその効力発生日を通知又は周知するものとします。なお、本規約の変更に際して、法令上ユーザーの同意が必要となる場合において、当方は本規約の変更についてユーザーの同意（効力発生後、ユーザーが本サービスを利用した場合又は当方の定める期間内に登録取消の手続をとらなかったときには、ユーザーが変更後の本規約が適用されることに同意したものとみなすことを含みます。）を取得します。</p>
            </article>

            <article class="p-t_conts">
                <h3>18． 事業譲渡等</h3>
                <p>当方は、本サービス及び関連する事業を他社に譲渡した場合は、本規約に基づく権利義務、契約上の地位、アカウント登録情報等の本サービス上の情報を譲受人に譲渡できるものとします。本条の定める内容について、登録ユーザーは予め合意したものとします。</p>
            </article>

            <article class="p-t_conts">
                <h3>19． 分離可能性</h3>
                <table>
                    <tbody>
                        <tr>
                            <td class="p-t-o">1.</td>
                            <td>本規約のいずれかの条項又はその一部が法令上無効であるとされた場合であっても、無効とされた当該条項以外の本規約に定める条件については、引き続き有効なものとして適用されるものとします。当方及びユーザーは、当該無効とされた条項の趣旨に従い、これと同等の効果を確保できるように努めるとともに、修正された本規約に拘束されることに同意するものとします。</td>
                        </tr>
                        <tr>
                            <td class="p-t-o">2.</td>
                            <td>本規約のいずれかの条項又はその一部が、あるユーザーとの関係で無効と判断された場合であっても、他のユーザーとの関係における有効性等には影響を及ぼさないものとします。</td>
                        </tr>
                    </tbody>
                </table>
            </article>

            <article class="p-t_conts">
                <h3>20． 準拠法</h3>
                <p>本規約の準拠法は日本法とします。</p>
            </article>

        </div>  
    </section>

@endsection
