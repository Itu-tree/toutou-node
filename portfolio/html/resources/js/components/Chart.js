import React, { PureComponent } from 'react';
import ReactDOM from 'react-dom';
import {
  LineChart, Line, XAxis, YAxis, CartesianGrid, Tooltip, Legend,
} from 'recharts';

// const data = [
//   {
//     name: 'Page A', uv: 4000, pv: 2400, 
//   },
//   {
//     name: 'Page B', uv: 3000, pv: 1398, 
//   },
//   {
//     name: 'Page C', uv: 2000, pv: 9800, 
//   },
//   {
//     name: 'Page D', uv: 2780, pv: 3908, 
//   },
//   {
//     name: 'Page E', uv: 1890, pv: 4800,
//   },
//   {
//     name: 'Page F', uv: 2390, pv: 3800, 
//   },
//   {
//     name: 'Page G', uv: 3490, pv: 4300,
//   },
// ];

class Chart extends PureComponent {
  constructor(props) {
    super(props);
    this.state = {
      data: [],
    }
  }

  componentDidMount() {
    axios
      .get('/api/get/transform/' + this.props.user_id)
      .then((res) => {
        //todosを更新（描画がかかる）
        this.setState({
          data: res.data
        });
      })
      .catch(error => {
        console.log(error)
      })
  }
  render() {
    return (
      <LineChart
        width={1200}
        height={900}
        data={this.state.data}
        margin={{
          top: 5, right: 30, left: 20, bottom: 5,
        }}
      >
        <CartesianGrid strokeDasharray="3 3" />
        <XAxis dataKey="time" />
        <YAxis yAxisId="left" />
        <YAxis yAxisId="right" orientation="right" />
        <Tooltip />
        <Legend />
        <Line yAxisId="left" type="monotone" dataKey="px" stroke="#006699" dot={false} />
        <Line yAxisId="left" type="monotone" dataKey="py" stroke="#003366" dot={false} />
        <Line yAxisId="left" type="monotone" dataKey="pz" stroke="#000099" dot={false} />
        <Line yAxisId="right" type="monotone" dataKey="rx" stroke="#cc0000" dot={false} />
        <Line yAxisId="right" type="monotone" dataKey="ry" stroke="#ff99cc" dot={false} />
        <Line yAxisId="right" type="monotone" dataKey="rz" stroke="#ffcccc" dot={false} />
      </LineChart>
    );
  }
}

if (document.getElementById('chart')) {
  let user_id = document.getElementById('chart').getAttribute('user_id');
  ReactDOM.render(<Chart user_id={user_id} />, document.getElementById('chart'));
}