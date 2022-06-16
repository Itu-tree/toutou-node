// ページの読み込みを待つ
window.addEventListener('load', init);
// // 初期化のために実行
// onResize();
// // リサイズイベント発生時に実行
// window.addEventListener('resize', onResize);


function init() {
    // サイズを指定
    const width = window.innerWidth;
    const height = document.documentElement.scrollHeight;

    let rot = 0;
    let mouseX = 0; // マウス座標

    // レンダラーを作成
    const renderer = new THREE.WebGLRenderer({
        canvas: document.querySelector('#myCanvas')
    });
    renderer.setSize(width, height);

    // シーンを作成
    const scene = new THREE.Scene();

    // カメラを作成
    const camera = new THREE.PerspectiveCamera(45, width / height);

    //create pararell light
    const directionalLight = new THREE.DirectionalLight(0xffffff);
    directionalLight.position.set(1, 1, 1);
    scene.add(directionalLight);

    //create material
    const material = new THREE.MeshStandardMaterial({
        map: new THREE.TextureLoader().load('images/earthmapthumb.jpg'),
        side: THREE.DoubleSide
    })

    //create shape of sphere
    const geometry = new THREE.SphereGeometry(30, 30, 30);
    //create mesh
    const mesh = new THREE.Mesh(geometry, material);
    //add mesh to scene
    //scene.add(mesh);

    //create star particles
    createStarField();
    function createStarField() {
        const geometry = new THREE.Geometry();
        for (let i = 0; i < 10000; i++) {
            geometry.vertices.push(
                new THREE.Vector3(
                    3000 * (Math.random() - 0.5),
                    3000 * (Math.random() - 0.5),
                    3000 * (Math.random() - 0.5),
                )
            );

            geometry.colors.push(
                new THREE.Color(0xffff)
            );
        }
        const material = new THREE.PointsMaterial({
            size: 5,
            color: 0xffffff,
            vertexColors: true
        })
        const mesh = new THREE.Points(geometry, material);
        scene.add(mesh);
    }

    document.addEventListener('mousemove', (event) => {
        mouseX = event.pageX;
    })

    tick();

    // 毎フレーム時に実行されるループイベントです
    function tick() {
        rot += 0.2; // 毎フレーム角度を0.5度ずつ足していく
        const targetRot = (mouseX / window.innerWidth) * 360;
        //rot += (targetRot - rot) * 0.02;

        // ラジアンに変換する
        const radian = (rot * Math.PI) / 180;
        // 角度に応じてカメラの位置を設定
        camera.position.x = 1000 * Math.sin(radian);
        camera.position.z = 1000 * Math.cos(radian);
        // 原点方向を見つめる
        camera.lookAt(new THREE.Vector3(0, 0, 0));
        // メッシュを回転させる
        //mesh.rotation.y += 0.01;
        // レンダリング
        renderer.render(scene, camera);

        requestAnimationFrame(tick);
    }

    onResize();
    window.addEventListener('resize', onResize);

    function onResize() {
        //サイズ取得
        const width = window.innerWidth;
        const height = document.documentElement.scrollHeight;

        //レンダラーのサイズを調整する．
        renderer.setPixelRatio(window.devicePixelRatio);
        renderer.setSize(width, height);

        //カメラのアスペクト比をただす．
        camera.aspect = width / height;
        camera.updateProjectionMatrix();
    }
}
